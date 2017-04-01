<?php

namespace SKCMS\BlogBundle\Form;

use SKCMS\BlogBundle\Entity\BlogCategory;
use SKCMS\CoreBundle\Entity\PageTemplate;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SKCMS\CoreBundle\Entity\EntityList;
use SKCMS\CoreBundle\Entity\Menu;

class BlogPostType extends AbstractType
{
    public function __construct()
    {

    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,['label'=>'Titre'])
            ->add('picture','skimage',['label'=>'Image Principale'])
            ->add('summary','ckeditor',['config_name'=>'justText','label'=>'Introduction'])
            ->add('content','ckeditor',['config_name'=>'justText','label'=>'Contenu'])
            ->add('category','entity',['label'=>'Categorie','class'=>BlogCategory::class,'required'=>false])
            ->add('tags',BlogTagType::class,['label'=>'Tags'])
            ->add('slug','skscms_protecedinput',['required'=>false])
            ->add('minRoleAccess','choice',['choices'=>['ANON'=>'anonyme','ROLE_USER'=>'user','ROLE_CLIENT'=>'client','ROLE_ADMIN'=>'admin']])
            ->add('redirectRoute',null,['required'=>false])
            ->add('forward',null,['required'=>false])
            ->add('seoTitle',null,['required'=>false])
            ->add('seoDescription','textarea',['required'=>false])

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SKCMS\BlogBundle\Entity\BlogPost'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'skcms_blogbundle_blogpost';
    }
}
