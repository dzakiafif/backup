<?php

/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/04/16
 * Time: 2:26
 */

namespace Yanna\bts\Http\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Yanna\bts\Domain\Entity\Documentation;
use Yanna\bts\Domain\Entity\Engineer;
use Yanna\bts\Domain\Entity\EngineerDua;
use Yanna\bts\Domain\Entity\Site;
use Yanna\bts\Domain\Entity\User;
use Yanna\bts\Domain\Services\EngineerServices;
use Yanna\bts\Domain\Services\userPasswordMatcher;
use Yanna\bts\Http\Form\gmapForm;
use Yanna\bts\Http\Form\loginForm;
use Yanna\bts\Http\Form\selectSiteAfterLoginForm;
use Yanna\bts\Http\Form\siteForm;
use Yanna\bts\Http\Form\UpdateUserForm;
use Yanna\bts\Http\Form\userForm;

//use Yanna\bts\Domain\Services\UserServices;

class AppController implements ControllerProviderInterface
{

    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Main Controller
     * @param  Application $app [description]
     * @return Controller           [description]
     */
    public function connect(Application $app)
    {
        $controller = $app['controllers_factory'];

        /**
         * -------------------------
         * Core Controller
         * -------------------------
         */
        $controller->get('/error404', [$this, 'errorPageAction'])
            ->bind('errorPage');

        $controller->get('/home', [$this, 'homeAction'])
            ->before([$this, 'checkUserRole'])
            ->bind('home');

        $controller->get('/createRawUser', [$this, 'createRawUserAction'])
            ->bind('createUser');

        $controller->get('/logout', [$this, 'logoutAction'])
            ->bind('logout');

        $controller->match('/login', [$this, 'loginAdminAction'])
            ->before([$this, 'checkUserRole'])
            ->bind('loginAdmin');

        $controller->match('/printReport', [$this, 'printReportBeforeAction'])
            ->bind('printReportAllBefore');

        $controller->get('/reviewAll', [$this, 'reviewAllAction'])
            ->bind('reviewAll');

        $controller->get('/printReportAfter', [$this, 'printReportAction'])
            ->bind('printReportAllAfter');

        /**
         * -------------------------
         * Admin or Owner Controller
         * -------------------------
         */
//        $controller->match('/siteSelect', [$this, 'selectSiteAction'])
////            ->before([$this, 'checkUserEngineer'])
//                ->bind('siteSelect');

        $controller->match('/newUser', [$this, 'newUserAction'])
            ->before([$this, 'checkUserException'])
            ->bind('newInputUser');

        $controller->match('/updateUser', [$this, 'updateUserAction'])
//            ->before([$this, 'checkUserException'])
            ->bind('updateUser');

        $controller->get('/listUser', [$this, 'showAllUser'])
            ->bind('listUser');

        $controller->get('/deleteUser/{id}', [$this, 'deleteUserAction'])
            ->bind('deleteUser');

        $controller->get('/deleteSite/{id}', [$this, 'deleteSiteAction'])
            ->bind('deleteSite');

        $controller->match('/newSite', [$this, 'newSiteAction'])
            ->bind('newInputSite');

        $controller->get('/listSite', [$this, 'showAllSite'])
            ->bind('listSite');


        /**
         * -------------------------
         * Engineer Controller
         * -------------------------
         */
        $controller->get('/formOutdoor', [$this, 'outdoorInstallationAction'])
            ->bind('outdoorInstallation');

        $controller->get('/formInstallation', [$this, 'installationChecklistAction'])
            ->bind('installationChecklist');

        $controller->get('/formEnvironment', [$this, 'externalChecklistAction'])
            ->bind('externalChecklist');

        $controller->post('/formEnvironment', [$this, 'environmentMonitoringAction'])
            ->bind('environmentMonitoring');

        $controller->match('/selectSiteAfterLogin', [$this, 'selectSiteAfterLoginAction'])
            ->bind('selectSiteAfterLogin');

        $controller->post('/formInstallation', [$this, 'installationProccessAction'])
            ->bind('formInstalationProccess');

        $controller->match('/uploadImageAfter', [$this, 'uploadImageAction'])
            ->bind('uploadImageAfter');

        $controller->match('/uploadImage', [$this, 'uploadImageBeforeAction'])
            ->bind('uploadImageBefore');



        /**
         * -------------------------
         * Documentation Controller
         * -------------------------
         */

        $controller->match('/listForm', [$this, 'listFormDocumentationBeforeAction'])
            ->bind('listFormDocumentationBefore');


        $controller->get('/listFormAfter', [$this, 'listFormDocumentationAction'])
            ->bind('listFormDocumentation');

        $controller->get('/changeValStatus/{id}', [$this, 'changeValStatusAction'])
            ->bind('changeValStatus');

        $controller->get('/reviewFirstDocument', [$this, 'reviewFirstDocAction'])
            ->bind('reviewFirstDocument');

        $controller->get('/reviewSecondDocument', [$this, 'reviewSecondDocAction'])
            ->bind('reviewSecondDocument');

        $controller->match('/siteDocumentation', [$this, 'siteDocumentationBeforeAction'])
            ->bind('siteDocumentationBefore');

        $controller->get('/siteDocumentationAfter', [$this, 'siteDocumentationAction'])
            ->bind('siteDocumentation');

        $controller->post('/siteDocumentationAfter', [$this, 'siteDocumentationSubmitAction'])
            ->bind('siteDocumentationSubmit');

        /**
         * -------------------------
         * Vendor Controller
         * -------------------------
         */
        $controller->get('/btsForm', [$this, 'btsFormAction'])
            ->bind('btsForm');

        $controller->get('/btsCommissioningForm', [$this, 'btsCommissioningAction'])
            ->bind('btsCommissioning');

        $controller->get('/basicServiceForm', [$this, 'basicServiceAction'])
            ->bind('btsService');

        $controller->get('/integrationTestForm', [$this, 'integrationTestAction'])
            ->bind('integrationTest');

        $controller->get('/handoverTestInside', [$this, 'handoverTestInsideAction'])
            ->bind('handoverTestInside');

        $controller->get('/handoverTestBetween', [$this, 'handoverTestBetweenAction'])
            ->bind('handoverTestBetween');

        $controller->match('/listFormDoc', [$this, 'listFormDocBeforeAction'])
            ->bind('listFormDocBefore');

        $controller->get('/listFormDocAfter', [$this, 'listFormDocAction'])
            ->bind('listFormDocAfter');

        $controller->get('/reviewDocFile', [$this, 'reviewDocDocumentAction'])
            ->bind('reviewDocDocument');


        $controller->get('/punchListForm', [$this, 'punchListAction'])
            ->bind('punchListSummary');

        $controller->get('/showJson', [$this, 'showJsonAction'])
            ->bind('showJsonSite');
//
//        $controller->match('/upload', [$this, 'photoAction'])
//            ->bind('uploadFile');

        $controller->get('/map', [$this, 'gmapAction'])
            ->bind('gmap');

        return $controller;
    }

    public function reviewDocDocumentAction()
    {
        $docData = $this->app['documentation.repository']->findByFormId($this->app['request']->get('id'));
        $docFormState = unserialize($docData->formState);
        return $this->app['twig']->render('Vd/reviewDoc.twig', ['infoForm' => $docData, 'revDoc' => $docFormState]);

    }

    public function listFormDocBeforeAction(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            $this->app['session']->set('siteVendorSelect', ['value' => $request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('listFormDocAfter'));
        }
        $siteList = $this->app['engineerdua.repository']->findAll();
        return $this->app['twig']->render('Vd/siteSelect.twig', ['listSite' => $siteList]);
    }

    public function listFormDocAction()
    {
        $docFormList = $this->app['documentation.repository']->findBySiteName($this->app['session']->get('siteVendorSelect')['value']);

        return $this->app['twig']->render('Vd/listDocForm.twig', ['listDoc' => $docFormList]);
//        return $this->app['twig']->render('Vd/listDocForm.twig');
//        return 'ok';
    }

    public function changeValStatusAction()
    {
        $validationStat = $this->app['engineer.repository']->findById($this->app['request']->get('id'));
        EngineerServices::changeStatus($validationStat);

        $this->app['orm.em']->persist($validationStat);
        $this->app['orm.em']->flush();
        $this->app['session']->getFlashBag()->add(
            'message_success',
            'Command completed successfully'
        );

        return $this->app->redirect($this->app['url_generator']->generate('listFormDocumentation'));
    }

    public function reviewFirstDocAction()
    {
        $documentId = $this->app['engineer.repository']->findByFormId($this->app['request']->get('id'));
        $docFormState = unserialize($documentId->formState);
        return $this->app['twig']->render('Documentation/reviewFirstDocument.twig', ['formState' => $docFormState, 'fileDoc' => $documentId]);
    }

    public function reviewSecondDocAction()
    {
        $documentId = $this->app['engineerdua.repository']->findByFormId($this->app['request']->get('id'));
        $docFormState = unserialize($documentId->formState);
        return $this->app['twig']->render('Documentation/reviewSecondDocument.twig', ['formState' => $docFormState, 'fileDoc' => $documentId]);

    }

    public function selectSiteAfterLoginAction(Request $request)
    {
        $sites = $this->app['site.repository']->findAll();

        if ($request->getMethod() == 'POST') {
            $this->app['session']->set('site', ['value' => $request->get('site_id')]);

            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

//        var_dump($sites);

        $siteName = [];
        $jsonSiteName = [];
        foreach ($sites as $key => $val) {
            $siteName[$val->id] = $val;
            $jsonSiteName[$val->id] = (array) $val;
        }

        $newSiteForm = new selectSiteAfterLoginForm();
        $newSiteForm->setSiteName($siteName);

        $formBuilder = $this->app['form.factory']->create(selectSiteAfterLoginForm::class, $newSiteForm, []);

        return $this->app['twig']->render('Engineer/siteSelect.twig', [
            'form' => $formBuilder->createView(),
            'siteName' => $siteName,
            'jsonSites' => $jsonSiteName,
        ]);
    }

    public function checkUserEngineer(Request $request)
    {
        if ($request->getPathInfo() === '/siteSelect' && $this->app['session']->has('uname')) {
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

        if ( ! ($this->app['session']->get('role') == 3) && ! ($request->getPathInfo() === '/siteSelect')) {
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }
    }

    public function checkUserRole(Request $request)
    {
        if ($request->getPathInfo() === '/login' && $this->app['session']->has('uname')) {
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

        if ( ! $this->app['session']->has('uname') && ! ($request->getPathInfo() === '/login')) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Please Login First'
            );
            return $this->app->redirect($this->app['url_generator']->generate('loginAdmin'));
        }
    }

    public function homeAction()
    {
        return $this->app['twig']->render('home.twig');
    }

    public function createRawUserAction()
    {
        // $informasi = User::create('yanna', 'yanna', 'faster', 3);

        // $this->app['orm.em']->persist($informasi);
        // $this->app['orm.em']->flush($informasi);
        $formId = substr(strtoupper(($this->app['session']->get('uname')['value'])), 0, 3) . date("Ymdhis");

        // return $this->app->redirect($this->app['url_generator']->generate('home'));
        // 


        return $formId;
    }

    public function loginAdminAction(Request $request)
    {
        $loginForm = new LoginForm();

        $formBuilder = $this->app['form.factory']->create($loginForm, $loginForm);
//        var_dump($formBuilder);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if ( ! $formBuilder->isValid()) {
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }

        $user = $this->app['user.repository']->findByUsername($loginForm->getUsername());

        if ($user === null) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Username Incorrect'
            );
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }

        if ( ! (new UserPasswordMatcher($loginForm->getPassword(), $user))->match()) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Incorrect Username or Password given'
            );

            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }
        $role = $request->get('role');

        if ( ! ($user->getRole() == $role)) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Role Salah'
            );
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }


        $this->app['session']->set('role', ['value' => $user->getRole()]);
        $this->app['session']->set('uname', ['value' => $user->getUsername()]);
        $this->app['session']->set('name', ['value' => $user->getName()]);
        $this->app['session']->set('uid', ['value' => $user->getId()]);
        $this->app['session']->set('created', ['value' => $user->getCreatedAt()]);

        if ($user->getRole() == 3) {
            return $this->app->redirect('/selectSiteAfterLogin');
        }

        return $this->app->redirect($this->app['url_generator']->generate('home'));
    }

    public function logoutAction()
    {
        $this->app['session']->clear();

        return $this->app->redirect($this->app['url_generator']->generate('loginAdmin'));
    }

    public function checkUserException()
    {
        $infoRules = $this->app['session']->get('role');

        if ($infoRules['value'] !== 0) {
            return $this->app->redirect($this->app['url_generator']->generate('errorPage'));
        }
    }

    public function errorPageAction()
    {
        return $this->app['twig']->render('error404.twig');
    }

    public function newUserAction(Request $request)
    {
        $newUserForm = new UserForm();
        $formBuilder = $this->app['form.factory']->create($newUserForm, $newUserForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('newUser.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if ( ! $formBuilder->isValid()) {
            return $this->app['twig']->render('newUser.twig', ['form' => $formBuilder->createView()]);
        }

        $dataUser = User::create($newUserForm->getName(), $newUserForm->getUsername(), $newUserForm->getPassword(), $newUserForm->getRole());

        $this->app['orm.em']->persist($dataUser);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'Account Created Successfully'
        );
        return $this->app->redirect($this->app['url_generator']->generate('listUser'));
    }

    public function updateUserAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->app['orm.em'];
        $user = $em->getRepository('Yanna\bts\Domain\Entity\User')->findById($id);
//        var_dump($user);

        $updateUserForm = new UpdateUserForm();
        $updateUserForm->setId($user->getId());
//        $updateUserForm->setName($user->getName());
        $updateUserForm->setUsername($user->getUsername());
        $updateUserForm->setRole($user->getRole());

        $formBuilder = $this->app['form.factory']->create($updateUserForm, $updateUserForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('updateUser.twig', [
                'form' => $formBuilder->createView(),
                'id' => $id,
                'actions' => '/updateUser/' . $id,
            ]);
        }

        $formBuilder->handleRequest($request);

        if ( ! $formBuilder->isValid()) {
            return $this->app['twig']->render('updateUser.twig', [
                'form' => $formBuilder->createView(),
                'actions' => '/updateUser/' . $id,
            ]);
        }

        $user->update($user, $updateUserForm->getName(), $updateUserForm->getUsername(), $updateUserForm->getPassword(), $updateUserForm->getRole());
        $em->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'Account Successfully Updated'
        );

        return $this->app->redirect($this->app['url_generator']->generate('listUser'));
    }

//    public function updateUserAction(Request $request)
//    {
//        $updateUserForm = new UpdateUserForm();
//        $formBuilder = $this->app['form.factory']->create($updateUserForm, $updateUserForm);
//
//        if ($request->getMethod() === 'GET') {
//            return $this->app['twig']->render('updateUser.twig', ['form' => $formBuilder->createView()]);
//        }
//
//        $formBuilder->handleRequest($request);
//
//        if ( ! $formBuilder->isValid()) {
//            return $this->app['twig']->render('updateUser.twig', ['form' => $formBuilder->createView()]);
//        }
//
//        $dataUser = User::update($updateUserForm->getName(), $updateUserForm->getUsername(), $updateUserForm->getPassword(), $updateUserForm->getRole());
//
//        $this->app['orm.em']->persist($dataUser);
//        $this->app['orm.em']->flush();
//
//        $this->app['session']->getFlashBag()->add(
//            'message_success', 'Account Created Successfully'
//        );
//        return $this->app->redirect($this->app['url_generator']->generate('listUser'));
//    }


    public function showAllUser()
    {
        $user = $this->app['user.repository']->findAll();

        return $this->app['twig']->render('listUser.twig', ['userList' => $user]);
    }

    public function deleteUserAction()
    {
        $user = $this->app['user.repository']->findById($this->app['request']->get('id'));

        $this->app['orm.em']->remove($user);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('listUser'));
    }

    public function newSiteAction(Request $request)
    {
        $newSiteForm = new siteForm();
        $formBuilder = $this->app['form.factory']->create($newSiteForm, $newSiteForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('newSite.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if ( ! $formBuilder->isValid()) {
            return $this->app['twig']->render('newSite.twig', ['form' => $formBuilder->createView()]);
        }

        $dataSite = Site::create($newSiteForm->getRegional(), $newSiteForm->getPoc(), $newSiteForm->getProdef(), $newSiteForm->getSiteId(), $newSiteForm->getSiteName(), $newSiteForm->getTowerId(), $newSiteForm->getAddress(), $newSiteForm->getFop(), $newSiteForm->getLongitude(), $newSiteForm->getLatitude(), $newSiteForm->getExistingSystem(), $newSiteForm->getRemark(), $newSiteForm->getStats());

        $this->app['orm.em']->persist($dataSite);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'Site Created Successfully'
        );
        return $this->app->redirect($this->app['url_generator']->generate('listSite'));
    }

    public function deleteSiteAction()
    {
        $site = $this->app['site.repository']->findById($this->app['request']->get('id'));

        $this->app['orm.em']->remove($site);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('listSite'));
    }

    public function showAllSite()
    {
        $site = $this->app['site.repository']->findAll();
        $infoUser = $this->app['session']->get('role');

        return $this->app['twig']->render('listSite.twig', ['siteList' => $site, 'infoUser' => $infoUser]);
    }

    public function showJsonAction(Request $request)
    {

        $site = $this->app['site.repository']->findAll();

        if ($request->getMethod() === 'GET') {
            return $this->app->json($site);
        }

        if ($request->getMethod() === 'POST') {
            return $this->app->json($site);
        }
//        return var_dump($site);
    }

    public function uploadImageBeforeAction(Request $request)
    {
        $siteInfo = $this->app['documentation.repository']->findAll();

        if ($request->getMethod() === 'POST') {
            $this->app['session']->set('imageSelectSite', ['value' => $request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('uploadImageAfter'));
        }

        return $this->app['twig']->render('Engineer/uploadImageBefore.twig',
            [
                'infoSite' => $siteInfo
            ]
        );
    }

    public function uploadImageAction(Request $request)
    {
        $siteInfo = $this->app['documentation.repository']->findByFormId($this->app['session']->get('imageSelectSite')['value']);

        $files = new ArrayCollection();
        if ($request->getMethod() === 'POST') {

            $files->add(Document::create(
                'Site Location',
                $request->get('image1_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Gps Coordinate',
                $request->get('image2_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Gps Coordinate',
                $request->get('image2_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Shelter View',
                $request->get('image3_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Shelter View',
                $request->get('image3_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Overview of inside the cabinet',
                $request->get('image4_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Overview of inside the cabinet',
                $request->get('image4_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'FEP Indoor View',
                $request->get('image5_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                ' FEP Outdoor View',
                $request->get('image6_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Feeder Indoor Installation',
                $request->get('image7_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Alarm Box',
                $request->get('image8_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'ACPDB Internal',
                $request->get('image9_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'MCB at DCPDB',
                $request->get('image10_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Rectifier Cabinet',
                $request->get('image11_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'MCB at Rectifier Cabinet',
                $request->get('image12_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Rack 19',
                $request->get('image12_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Antenna Mechanical & Electrical Tilting Sector 1',
                $request->get('image13_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Antenna Mechanical & Electrical Tiltin Sector 2',
                $request->get('image14_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Antenna Mechanical & Electrical Tiltin Sector 3',
                $request->get('image15_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Azimuth & Panoramic Sector 1',
                $request->get('image16_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Azimuth & Panoramic Sector 2',
                $request->get('image17_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image17_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Azimuth & Panoramic Sector 3',
                $request->get('image18_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Labelling of CPRI',
                $request->get('image18_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image19_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image19_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image20_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image20_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image21_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image21_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image22_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image22_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image23_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image24_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image24_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image25_1'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            $files->add(Document::create(
                'Site Location',
                $request->get('image25_2'),
                $this->app['session']->get('imageSelectSite')['value']
            ));

            foreach ($files as $dokumen) {
                $this->app['orm.em']->persist($dokumen);
                $this->app['orm.em']->flush();

                return 'OK';
            }
        }

        return $this->app['twig']->render('Engineer/uploadImageAfter.twig', ['infoSite' => $siteInfo]);
    }

    public function jsonJawabanAction(Request $request)
    {

        $jawaban = $this->app['jawaban.repository']->findAll();

        if ($request->getMethod() === 'GET') {
            return $this->app->json($jawaban);
        }
    }

    /**
     * Engineer Installation Form 2.1.1 (Indoor)
     * @return mixed
     */
    public function installationChecklistAction(Request $request)
    {
        $siteId = $this->app['session']->get('site')['value'];
        if ($this->app['session']->get('site')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('selectSiteAfterLogin'));
        } else {
            $siteInformation = $this->app['site.repository']->findById($siteId);
            $form = [];
            return $this->app['twig']->render('Engineer/installationChecklistForm.twig', [
                'form' => $form,
                'siteInfo' => $siteInformation
            ]);
        }

    }

    public function externalChecklistAction(Request $request)
    {
        $siteId = $this->app['session']->get('site')['value'];
        if ($this->app['session']->get('site')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('selectSiteAfterLogin'));
        } else {
            if ($this->app['session']->get('tempFormId')['value'] == null) {
                return $this->app->redirect($this->app['url_generator']->generate('installationChecklist'));
            } else {
                $siteInformation = $this->app['site.repository']->findById($siteId);
                $form = [];
                return $this->app['twig']->render('Engineer/environmentMonitoringForm.twig', [
                    'form' => $form,
                    'siteInfo' => $siteInformation
                ]);
            }
        }
    }

    public function documentationChecklistAction(Request $request)
    {

    }


    /**
     * Engineer Installation Form 2.1.2 (Outdoor)
     * @return mixed
     */
    public function outdoorInstallationAction()
    {
        return $this->app['twig']->render('Engineer/outdoorInstallationForm.twig');
    }

    /**
     * Engineer Environment Monitoring Form 2.2.1
     * @return mixed
     */
    public function environmentMonitoringAction(Request $request)
    {
        $engineerFlush = new EngineerDua();
//        $formId = substr(strtoupper(($this->app['session']->get('uname')['value'])),0,3) . date("Ymdhis") . 'EN';
        $uname = $this->app['session']->get('uname')['value'];
        $formState = $request->get('c');
        $siteName = $this->app['site.repository']->findById($this->app['session']->get('site')['value']);

        $engineerFlush->setSiteName($siteName->siteName);
        $engineerFlush->setFormState(serialize($formState));
        $engineerFlush->setFormId($this->app['session']->get('tempFormId')['value']);
        $engineerFlush->setUsername($uname);
        $engineerFlush->setValidateState(0);
        $engineerFlush->setCreatedAt(new \DateTime());


        $this->app['orm.em']->persist($engineerFlush);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('home'));
        // return json_encode($formState);
    }

    public function btsFormAction()
    {
        return $this->app['twig']->render('Vd/btsForm.twig');
    }

    public function btsCommissioningAction()
    {
        return $this->app['twig']->render('Vd/btsCommissioningForm.twig');
    }

    public function basicServiceAction()
    {
        return $this->app['twig']->render('Vd/basicServicesForm.twig');
    }

    public function integrationTestAction()
    {
        return $this->app['twig']->render('Vd/integrationTestForm.twig');
    }

    public function handoverTestInsideAction()
    {
        return $this->app['twig']->render('Vd/handoverTestForm.twig');
    }

    public function handoverTestBetweenAction()
    {
        return $this->app['twig']->render('Vd/handoverTestBettweenForm.twig');
    }

    public function punchListAction()
    {
        return $this->app['twig']->render('Vd/punchListForm.twig');
    }

    public function printReportBeforeAction()
    {
        $siteInfo = $this->app['engineer.repository']->findAll();

        if ($this->app['request']->getMethod() === 'POST') {
            $this->app['session']->set('siteSelect', ['value' => $this->app['request']->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('printReportAllAfter'));
        }

        return $this->app['twig']->render('printReportBefore.twig', ['infoSite' => $siteInfo]);
    }

    public function reviewAllAction()
    {
        if ($this->app['session']->get('siteSelect')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('printReportAllBefore'));
        }

        $engineerInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $engineerDuaInfo = $this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $docInfo = $this->app['documentation.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $siteInfo = $this->app['site.repository']->findBySiteName($engineerInfo->getSiteName());

        return $this->app['twig']->render('printReport.twig',
            [
                'formState' => unserialize($engineerInfo->getFormState()),
                'infoEngineerDua' => unserialize($engineerDuaInfo->getFormState()),
                'revDoc' => unserialize($docInfo->getFormState()),
                'infoSite' => $siteInfo
            ]
        );
    }

    public function printReportAction()
    {
        if ($this->app['session']->get('siteSelect')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('printReportAllBefore'));
        }

        $engineerInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $engineerDuaInfo = $this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $docInfo = $this->app['documentation.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $siteInfo = $this->app['site.repository']->findBySiteName($engineerInfo->getSiteName());

        return $this->app['twig']->render('printReport.twig',
            [
                'formState' => unserialize($engineerInfo->getFormState()),
                'infoEngineerDua' => unserialize($engineerDuaInfo->getFormState()),
                'revDoc' => unserialize($docInfo->getFormState()),
                'infoSite' => $siteInfo
            ]
        );
    }

    public function installationProccessAction(Request $request)
    {
        $engineerFlush = new Engineer();
        $formId = substr(strtoupper(($this->app['session']->get('uname')['value'])), 0, 3) . date("Ymdhis") . 'EN';
        $uname = $this->app['session']->get('uname')['value'];
        $formState = $request->get('c');
        $siteName = $this->app['site.repository']->findById($this->app['session']->get('site')['value']);

        $this->app['session']->set('tempFormId', ['value' => $formId]);
        $engineerFlush->setSiteName($siteName->siteName);
        $engineerFlush->setFormId($formId);
        $engineerFlush->setFormState(serialize($formState));
        $engineerFlush->setUsername($uname);
        $engineerFlush->setValidateState(0);
        $engineerFlush->setCreatedAt(new \DateTime());
        $this->app['orm.em']->persist($engineerFlush);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('home'));
    }


    public function listFormDocumentationBeforeAction(Request $request)
    {
        $siteInfo = $this->app['engineerdua.repository']->findAll();

        if ($request->getMethod() === 'POST') {
            $this->app['session']->set('siteSelect', ['value' => $request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('listFormDocumentation'));
        }

        return $this->app['twig']->render('Documentation/listFormBefore.twig', ['infoSite' => $siteInfo]);
    }

    public function siteDocumentationBeforeAction()
    {
        $siteList = $this->app['engineerdua.repository']->findAll();
        if ($this->app['request']->getMethod() === 'POST') {
            $this->app['session']->set('siteDocumentationSelect', ['value' => $this->app['request']->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('siteDocumentation'));
        }


        return $this->app['twig']->render('Documentation/siteSelect.twig', ['infoSite' => $siteList]);
    }

    public function listFormDocumentationAction()
    {
        $infoListEngineer = $this->app['engineer.repository']->findBySiteName($this->app['session']->get('siteSelect')['value']);

        return $this->app['twig']->render('Documentation/listForm.twig', ['listInfo' => $infoListEngineer]);
        // return var_dump($infoListEngineer);
    }

    public function siteDocumentationAction(Request $request)
    {
        $siteInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value']);

        return $this->app['twig']->render('Documentation/siteDocumentation.twig', ['infoSite' => $siteInfo]);
    }

    public function siteDocumentationSubmitAction(Request $request)
    {
        $docFlush = new Documentation();
        $formState = $request->get('c');

        $docFlush->setSiteName($this->app['engineer.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value'])->getSiteName());
        $docFlush->setFormState(serialize($formState));
        $docFlush->setFormId($this->app['session']->get('siteDocumentationSelect')['value']);
        $docFlush->setUsername($this->app['session']->get('uname')['value']);
        $docFlush->setCreatedAt(new \DateTime());
        $docFlush->setUpdatedAt(new \DateTime());

        $this->app['orm.em']->persist($docFlush);
        $this->app['orm.em']->flush();
        return $this->app->redirect($this->app['url_generator']->generate('home'));
    }


    public function gmapAction(Request $request)
    {
        $gmapForm = new gmapForm();

        $formBuilder = $this->app['form.factory']->create($gmapForm, $gmapForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('gmap.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if ( ! $formBuilder->isValid()) {
            return $this->app['twig']->render('gmap.twig', ['form' => $formBuilder->createView()]);
        }

        $dataGmap = Site::create($gmapForm->getLatitude(), $gmapForm->getLongitude());

        $this->app['orm.em']->persist($dataGmap);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'input benar'
        );
        return $this->app->redirect($this->app['url_generator']->generate('formInstallation'));
    }

}
