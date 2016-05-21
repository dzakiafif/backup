<?php

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class inputForm extends AbstractType {

	private $siteName;
	
	/**
	 * @param  FormBuilderInterface $builder
	 * @param  array                $options 
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add(
			'ch1',
			'choices',
			[
				'choices' => [
					'1' =>
				]
			]
		);
	}
}