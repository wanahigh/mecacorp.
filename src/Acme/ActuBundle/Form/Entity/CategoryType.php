<?
namespace App\Form;

use Acme\ActuBundle\Entity\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder->add('name');
}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => Category::class,
));
}
}