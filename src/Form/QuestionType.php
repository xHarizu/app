<?php
/**
 * Question type.
 */

namespace App\Form;

use App\Entity\Category;
use App\Entity\Question;
use Faker\Provider\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Class QuestionType.
 */
class QuestionType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder The form builder
     * @param array                                        $options The options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'subject',
            TextType::class,
            [
                'label' => 'label_subject',
                'required' => true,
                'attr' => ['max_length' => 45],
            ]
        );
        $builder->add(
            'text',
            TextType::class,
            [
                'label' => 'label_text',
                'required' => true,
                'attr' => ['max_length' => 200],
            ]
        );
        $builder->add(
            "category",
            EntityType::class,
            [
                'class' => Category::class,
                'choice_label' => function ($category) {
                return $category->getTitle();
                },
                'label' => 'label_category',
                'required' => true,
                'attr' => ['max_length' => 64],
                'empty_data' => '',
                ]
        );
    }

    /**
     * Configures the options for this type.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Question::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix(): string
    {
        return 'question';
    }
}