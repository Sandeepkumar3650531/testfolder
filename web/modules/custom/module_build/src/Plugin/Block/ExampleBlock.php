<?php

namespace Drupal\custom_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\media\Entity\Media;
use Drupal\file\Entity\File;

/**
 * Provides a block with simple text.
 * 
 * @Block(
 *   id = "simple_example_block",
 *   admin_label = @Translation("Simple text Block")
 * )
 */
class ExampleBlock extends BlockBase
{

    // Do something with your variables here.

    /**
     * {@inheritdoc}
     * 
     */
    public function build()
    {


        $node_details = Node::load(23);
        $title = $node_details->field_about_title->value;
        $subtitle = $node_details->field_about_subtitle->value;

        $portfolio = array('title' => $title, 'subtitle' => $subtitle);

        $paragraph = $node_details->field_about_discription->getValue();
        foreach ($paragraph as $element) {

            $pid = Paragraph::load($element['target_id']);
            $paragraph_title = $pid->field_title->getValue()[0]['value'];
            $paragraph_subtitle = $pid->field_subtitle->getValue()[0]['value'];
            $paragraph_aboutimg = file_create_url($pid->field_about_img->entity->getFileUri());
            $paragraph_discription = $pid->field_discription->getValue()[0]['value'];
            $paragraph_boolean = $pid->field_boolean->getValue()[0]['value'];

            $var[] = array(
                'title' => $paragraph_title,
                'subtitle' => $paragraph_subtitle,
                'about' => $paragraph_aboutimg,
                'discription' => $paragraph_discription,
                'boolean' => $paragraph_boolean
            );


        }

      
        //print_r($paragraph_boolean);
        //die;

      //  echo"<pre>";
//print_r($var);
        return [
            '#theme' => 'custom_module_theme_hook',
            '#type' => 'markup',
            '#markup' => 'This is drupal 9 custom block.',
            '#variable1' => $portfolio,
            '#variable2' => $var,
        ];
    }
}