<?php
/**
 * Created by PhpStorm.
 * User: Jimmy
 * Date: 4/8/2016
 * Time: 2:04 AM
 */

/**
 * Register Doctrine Service Provider
 */
$app->register(new \Silex\Provider\DoctrineServiceProvider(), $config['db']);

/**
 * Register Doctrine ORM Service Provider
 */
$app->register(new \Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider(), $config['orm']);

/**
 * Register Twig Templating Service Provider
 */
$app->register(new \Silex\Provider\TwigServiceProvider(), $config['twig']);

/**
 * Register Monolog Service Provider
 */
$app->register(new \Silex\Provider\MonologServiceProvider());

/**
 * Register Form Service Provider
 */
$app->register(new \Silex\Provider\FormServiceProvider());

/**
 * Register Translation Service Provider
 */
$app->register(new \Silex\Provider\TranslationServiceProvider());

/**
 * Register Session Service Provider
 */
$app->register(new \Silex\Provider\SessionServiceProvider());

/**
 * Register Url Generator Service Provider
 */
$app->register(new \Silex\Provider\UrlGeneratorServiceProvider());

/**
 * Register Controller Service Provider
 */
$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

/**
 * Register Http Fragment Service Provider
 */
$app->register(new \Silex\Provider\HttpFragmentServiceProvider());

/**
 * Register Validator Service Provider
 */
$app->register(new \Silex\Provider\ValidatorServiceProvider());

/**
 * Register Web Profiler Service Provider
 */
if ($app['debug']) {
    Symfony\Component\Debug\Debug::enable(E_ALL, true);
    $app->register(new \Silex\Provider\WebProfilerServiceProvider(), $config['profiler']);
}

$app['user.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\User::class);
};

$app['site.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\Site::class);
};

$app['engineer.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\Engineer::class);
};

$app['engineerdua.repository'] = function () use ($app){
  return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\EngineerDua::class);
};

$app['documentation.repository'] = function () use ($app){
    return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\Documentation::class);
};

$app['remark.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\Remark::class);
};

$app['dokumen.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(\Yanna\bts\Domain\Entity\Dokumen::class);
};
//$app['form.extensions'] = $app->share($app->extend('form.extensions', function ($extensions) use ($app) {
//    $manager = new \Yanna\bts\Http\Form\Extensions\Doctrine\Bridge\ManagerRegistry(null, array(), array('default'), null, null, '\Doctrine\ORM\Proxy\Proxy');
//    $manager->setContainer($app);
//    $extensions[] = new Symfony\Bridge\Doctrine\Form\DoctrineOrmExtension($manager);
//
//    return $extensions;
//}));