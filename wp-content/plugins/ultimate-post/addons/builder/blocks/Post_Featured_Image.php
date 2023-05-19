<?php
namespace ULTP\blocks;

defined('ABSPATH') || exit;

class Post_Featured_Image {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }
    public function get_attributes($default = false) {
        
        $attributes = array(
            'blockId' => [
                'type' => 'string',
                'default' => '',
            ],

            /*============================
                Post Featured Image Setting
            ============================*/
            'altText'  => [
                'type' => 'string',
                'default' => 'Image',
            ],
            'imgWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper .ultp-builder-image { max-width: {{imgWidth}}; }'
                    ],
                ],
            ],
            'imgHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper .ultp-builder-image img {height: {{imgHeight}}; }'
                    ],
                ],
            ],
            'imgRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-builder-image > img { border-radius:{{imgRadius}}; }'
                    ],
                ],
            ],
            'imgScale' => [
                'type' => 'string',
                'default' => 'cover',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'imgScale','condition'=>'==','value'=>'cover'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-wrapper .ultp-builder-image > img { object-fit: cover }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'imgScale','condition'=>'==','value'=>'contain'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-wrapper .ultp-builder-image > img { object-fit: contain }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'imgScale','condition'=>'==','value'=>'fill'],
                        ],
                        'selector'=>'{{ULTP}} .ultp-block-wrapper .ultp-builder-image > img { object-fit: fill }'
                    ],
                ], 
            ],
            'imageScale' => [
                'type' => 'string',
                'default' => 'cover',
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-builder-video {object-fit: {{imageScale}};}'
                    ],
                ],
            ],
            'imgAlign' => [
                'type' => 'object',
                'default' => (object)['lg' =>'left'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-image-wrapper:has(.ultp-builder-image) {display: flex; justify-content:{{imgAlign}}}'
                    ],
                ],
            ],
            
            /*============================
                Video Settings
            ============================*/
            'videoWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'100'],
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} .ultp-builder-video {width:{{videoWidth}}%;}'
                    ],
                ],
            ],
            'videoHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'ulg' =>'px', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector' => '{{ULTP}} .ultp-builder-video  {max-height:{{videoHeight}};}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  false]
                        ],
                        'selector' => '{{ULTP}} .ultp-builder-video {max-height:{{videoHeight}};}'
                    ],
                ],
            ],
            'vidAlign' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-image-wrapper:has(.ultp-builder-video) {display: flex; justify-content:{{vidAlign}}}'
                    ],
                ],
            ],
            'stickyEnable' => [
                'type' => 'boolean',
                'default' => false,
                
            ],
            'stickyWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'450'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector' => '{{ULTP}} .ultp-sticky-video.ultp-sticky-active {width:{{stickyWidth}}px !important;}'
                    ],
                ],
            ],
            'stickyPosition' => [
                'type' => 'string',
                'default' => 'bottomRight',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'bottomRight']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { bottom: 0px; right: 20px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'bottomLeft']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { bottom: 0px; left: 20px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'topRight']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { top: 0px; right: 20px;; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'topLeft']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { top: 0px; left: 20px; }'
                    ],
                ],
            ],
            'flexiblePosition' => [
                'type' => 'object',
                'default' => (object)['lg'=>'15', 'ulg' =>'px', 'unit' => 'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'bottomRight']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { bottom:{{flexiblePosition}}!important;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'center']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active {display: flex; justify-content: center; align-items: center;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'bottomLeft']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { bottom:{{flexiblePosition}} !important;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'topRight']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { top:{{flexiblePosition}} !important;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'topLeft']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { top:{{flexiblePosition}}!important;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'rightMiddle']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { display: flex; justify-content: flex-end; align-items: center;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true],
                            (object)['key' => 'stickyPosition','condition' => '==','value' =>  'leftMiddle']
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { display: flex; justify-content: flex-start; align-items: center; }'
                    ]
                ],
            ],
            'stickyBg' => [
                'type' => 'string',
                'default' => '#000',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { background:{{stickyBg}} }'
                    ],
                ],
            ],
            'stickyBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active'
                    ],
                ],
            ],
            'stickyBoxShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 1, 'width' => (object)['top' => 0, 'right' => 0, 'bottom' => 24, 'left' => 1],'color' => '#000000e6'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active'
                    ],
                ],
            ],
            
            'stickyRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { border-radius:{{stickyRadius}}; }'
                    ],
                ],
            ],
            'stickyPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)[]],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active { padding:{{stickyPadding}} !important; }'
                    ],
                ],
            ],
            'stickyCloseSize' => [
                'type' => 'string',
                'default' => '47',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active .ultp-sticky-close { height:{{stickyCloseSize}}px; width:{{stickyCloseSize}}px; } {{ULTP}} .ultp-sticky-video.ultp-sticky-active .ultp-sticky-close::after { font-size: calc({{stickyCloseSize}}px / 2);}'
                    ],
                ],
            ],
            'stickyCloseColor' => [
                'type' => 'string',
                'default' => '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}} .ultp-sticky-video.ultp-sticky-active .ultp-sticky-close { color:{{stickyCloseColor}} }'
                    ],
                ],
            ],
            'stickyCloseBg' => [
                'type' => 'string',
                'default' => ' rgb(43, 43, 43)',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key' => 'stickyEnable','condition' => '==','value' =>  true]
                        ],
                        'selector'=>'{{ULTP}}  .ultp-sticky-video.ultp-sticky-close { background-color:{{stickyCloseBg}} }'
                    ],
                ],
            ],

            /*============================
                Advanced Settings
            ============================*/
            'advanceId' => [
                'type' => 'string',
                'default' => '',
            ],
            'advanceZindex' => [
                'type' => 'number',
                'default' => '',
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {z-index:{{advanceZindex}};}'
                    ],
                ],
            ],
            'wrapMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper { margin:{{wrapMargin}}; }'
                    ],
                ],
            ],
            'wrapOuterPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper { padding:{{wrapOuterPadding}}; }'
                    ],
                ],
            ],
            'wrapBg' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper'
                    ],
                ],
            ],
            'wrapBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper'
                    ],
                ],
            ],
            'wrapShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper'
                    ],
                ],
            ],
            'wrapRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper { border-radius:{{wrapRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverBackground' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#037fff'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover { border-radius:{{wrapHoverRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'selector'=>'{{ULTP}} .ultp-block-wrapper:hover'
                    ],
                ],
            ],
            'hideExtraLarge' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'hideDesktop' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'hideTablet' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'hideMobile' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
            'advanceCss' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'selector' => '{{ULTP}} {display:none;}'
                    ],
                ],
            ],
        );
        
        if ($default) {
            $temp = array();
            foreach ($attributes as $key => $value) {
                if (isset($value['default'])) {
                    $temp[$key] = $value['default'];
                }
            }
            return $temp;
        } else {
            return $attributes;
        }
    }

    public function register() {
        register_block_type( 'ultimate-post/post-featured-image',
            array(
                'editor_script' => 'ultp-blocks-editor-script',
                'editor_style'  => 'ultp-blocks-editor-css',
                'attributes' => $this->get_attributes(),
                'render_callback' =>  array($this, 'content')
            )
        );
    }

    public function content($attr, $noAjax) {
        $block_name = 'post-image';
        $wrapper_before = $wrapper_after = $content = '';

        $post_video = get_post_meta(get_the_ID(), '__builder_feature_video', true);

        $embeded = $post_video ? ultimate_post()->get_embeded_video($post_video, false, true, true, true, true, false, true, array('width' => array('width' => $attr["videoWidth"])) ) : '';
        $post_thumb_id = get_post_thumbnail_id(get_the_ID());
        $img_content = ultimate_post()->get_image($post_thumb_id, '', '', $attr['altText']);

        if ($embeded || has_post_thumbnail()) {
            $wrapper_before .= '<div '.($attr['advanceId']?'id="'.$attr['advanceId'].'" ':'').' class="wp-block-ultimate-post-'.$block_name.' ultp-block-'.$attr["blockId"].(isset($attr["className"])?' '.$attr["className"]:'').''.(isset($attr["align"])? ' align' .$attr["align"]:'').'">';
                $wrapper_before .= '<div class="ultp-block-wrapper ultp-image-wrapper">';
                    $wrapper_before .= '<div  class="ultp-builder-'.($embeded ? "video": "image").'">';
                        $content .= '<div class="ultp-'.($embeded ? "video": "image").'-block'.($attr['stickyEnable'] ? " ultp-sticky-video": "").'">';
                        $content .= $embeded ? $embeded : $img_content;
                    $wrapper_after .= '<span class="ultp-sticky-close"></span></div>';
                    $wrapper_after .= '</div>';
                $wrapper_after .= '</div>';
            $wrapper_after .= '</div>';
        }
        return $wrapper_before.$content.$wrapper_after;
    }
}