<h3 class="tab-head">
    <?php echo esc_html( 'Rotating Words', 'la-wordsrotator'); ?>
    <button title="<?php esc_attr_e('Get Shortcode For This Group of Words', 'la-wordsrotator'); ?>" class="button-primary fullshortcode" id="1">
        <span title="<?php esc_attr_e('Get Shortcode', 'la-wordsrotator'); ?>" class="dashicons dashicons-shortcode"></span>
        <?php esc_html_e('Get Shortcode', 'la-wordsrotator'); ?>
    </button>
    <button class="button btnadd">
        <span title="<?php esc_attr_e('Add New Group of Words', 'la-wordsrotator'); ?>" class="dashicons dashicons-plus-alt"></span>
    </button>&nbsp;
    <button class="button btndelete">
        <span class="dashicons dashicons-dismiss" title="<?php esc_attr_e('Delete This Group of Words', 'la-wordsrotator'); ?>"></span>
    </button>
</h3>
<div class="tab-content">
    <table class="form-table">
        <?php
        $animation_effects = array(
           'zoomIn'    => 'Zoom In',
           'fade'      => 'Fade',
           'flipCube'  => 'Flip Cube',
           'flipUp'    => 'Flip Up',
           'flip'      => 'Flip'
           // Add more animation effects here
        );
        $fields = array(
            array(
                'label'       => __( 'Group Name', 'la-wordsrotator' ),
                'type'          => 'text',
                'field'          => 'rw_group_name',
                'input_class' => 'rw-group-name widefat form-control',
                'placeholder' => __( 'Name this group...', 'la-wordsrotator' ),
                'description' => __( 'Name this group. This would be for your reference which would be shown on red tab. Default: Rotating Words', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Give Start Sentence', 'la-wordsrotator' ),
                'type'        => 'textarea',
                'field'        => 'stat_sent',
                'input_class' => 'static-sen form-control',
                'placeholder' => __( 'Sentence before rotating words', 'la-wordsrotator' ),
                'description' => __( 'Write a starting sentence. Leave empty if have no starting words', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Add Words (these will be rotating)', 'la-wordsrotator' ),
                'type'        => 'textarea',
                'field'        => 'rot_words',
                'input_class' => 'rotating-words form-control',
                'placeholder' => __( 'first,second,third', 'la-wordsrotator' ),
                'description' => __( 'Comma separated list of words', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Give Ending Sentence', 'la-wordsrotator' ),
                'type'        => 'textarea',
                'field'        => 'end_sent',
                'input_class' => 'end-sen form-control',
                'placeholder' => __( 'Sentence after rotating words', 'la-wordsrotator' ),
                'description' => __( 'Write an ending sentence. Leave empty if have no ending words', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Sentence Alignment ( PRO Feature )', 'la-wordsrotator' ),
                'type'        => 'select',
                'field'        => '',
                'options'     => array('left' => 'Left','right' => 'Right','center' => 'Center'),
                'input_class' => 'rw-textalign form-control',
                'description' => __( 'Select in which direction sentence should be aligned.', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Sentence and Words Font Size ( PRO Feature )', 'la-wordsrotator' ),
                'type'        => 'number',
                'field'        => '',
                'placeholder' => __( 'Sentence and Words Font Size.', 'la-wordsrotator' ),
                'input_class' => 'font form-control',
                'description' => __( 'Set font size for words and sentence. Default 45px', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Sentence Color( PRO Feature )', 'la-wordsrotator' ),
                'type'        => 'text',
                'field'        => '',
                'placeholder' => __( 'Select Color.', 'la-wordsrotator' ),
                'input_class' => 'my-colorpicker',
                'description' => __( 'Choose color for the sentence. Default #000', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Animation Effect', 'la-wordsrotator' ),
                'type'        => 'select',
                'field'        => 'animation_effect',
                'options'     => array(
                                   'zoomIn'    => 'Zoom In',
                                   'fade'      => 'Fade',
                                   'flipCube'  => 'Flip Cube',
                                   'flipUp'    => 'Flip Up',
                                   'flip'      => 'Flip'
                                ),
                'input_class' => 'animate form-control',
                'description' => __( 'Select Animation effect for words. More effects in PRO version.', 'la-wordsrotator' )
            ),
            array(
                'label'       => __( 'Animation Speed', 'la-wordsrotator' ),
                'type'        => 'number',
                'field'        => 'animation_speed',
                'input_class' => 'animate-speed form-control',
                'placeholder' => __( 'Give animation speed.', 'la-wordsrotator' ),
                'description' => __( 'Select animation speed for words. Large value would slower animation. Default 1250.', 'la-wordsrotator' )
            )
        );

        foreach ( $fields as $field ) :
        ?>
            <tr>
                <td style="width:30%">
                    <strong><?php echo esc_html( $field['label'] ); ?></strong>
                </td>
                <td style="width:30%">
                    <?php if ( isset( $field['placeholder'] ) ) : ?>
                        <input class="<?php echo esc_attr( $field['input_class'] ); ?>" 
                               type="<?php echo esc_attr( $field['type'] ); ?>" 
                               placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>" 
                               value="">
                    <?php else : ?>
                        <select class="<?php echo esc_attr( $field['input_class'] ); ?>">
                            <?php foreach ($field['options'] as $value => $label): ?>
                                <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </td>
                <td style="width:40%">
                    <p class="description"><?php echo esc_html( $field['description'] ); ?>.</p>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <div class="ctrl-btn-group">
        <button title="<?php esc_attr_e('Add New Group of Words', 'la-wordsrotator'); ?>" class="button-primary add-new-btm"><span class="dashicons dashicons-plus-alt"></span><?php esc_html_e( 'Add New Group', 'la-wordsrotator' ); ?></button>
        <button title="<?php esc_attr_e('Remove This Group of Words', 'la-wordsrotator'); ?>" class="del-btm"><span class="dashicons dashicons-remove"></span><?php esc_html_e( 'Remove Group', 'la-wordsrotator' ); ?></button>
        <button title="<?php esc_attr_e('Get Shortcode For This Group of Words', 'la-wordsrotator'); ?>" class="bottom-shortcode" id="<?php echo esc_html( !empty($data['counter']) ? $data['counter'] : esc_html__('1', 'la-wordsrotator') ); ?>"><span class="dashicons dashicons-shortcode"></span><?php esc_html_e( 'Get Shortcode', 'la-wordsrotator' ); ?></button>
    </div>
</div>
