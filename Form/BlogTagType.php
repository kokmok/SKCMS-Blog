<?php
/**
 * Created by jona on 2/05/16
 */

namespace SKCMS\BlogBundle\Form;


use Doctrine\Common\Persistence\ObjectManager;
use SKCMS\BlogBundle\Form\DataTransformer\TagToNameTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogTagType extends AbstractType
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $transformer = new TagToNameTransformer($this->manager);
        $builder->addModelTransformer($transformer);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $tags = $this->manager->getRepository('SKCMSBlogBundle:BlogTag')->findAll();
        $possiblevalues = [];
        foreach($tags as $tag){
            $possiblevalues[]=['name'=>$tag->getName()];
        }

        $resolver->setDefaults([
            'attr' => ['data-source' => json_encode($possiblevalues),'class' => 'tagsinput']


        ]);
    }

    public function getParent()
    {
        return TextType::class;
    }
}