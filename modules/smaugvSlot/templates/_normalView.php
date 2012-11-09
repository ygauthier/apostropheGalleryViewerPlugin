<?php use_helper('a') ?>

<?php include_partial('smaugvSlot/assets') ?>
<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>

<?php if($galleryPager->count()){ ?>

    <?php $correctPath = SfMaugUtils::gallery_path(); ?>
    <div>
        <h2><?php echo $gallery->getTitle() ?></h2>
        <div>
            <span>
                <?php echo __("Date de création") ?>: <?php echo $gallery->getDateTimeObject('created_at')->format('m/d/Y') ?>
            </span>
            <span>
                <?php $photos = $gallery->getPhotos(); echo $photos->count() ?> <?php echo __("photos") ?>
            </span>
        </div>
        <ul id="sfMaug" class="thumbs">
            <?php foreach ($photos as $photo) {
            ?>
                <li>
                    <img src="<?php echo $correctPath . $gallery->getSlug() . "/" . $photo->getPicPath() ?>" alt="<?php echo $photo->getTitle() ?>" title="<?php echo $photo->getTitle() ?>" />
                <div class="gv-panel-overlay">
                    <h3><?php echo $gallery->getTitle() ?></h3>
                    <p><?php echo $photo->getTitle() ?></p>
                </div>

            </li>
            <?php } ?>
        </ul>
    </div>


    <script type="text/javascript">
        $(function(){
            $('#sfMaug').galleryView({
                    frame_width: 40,
                    pause_on_hover: true,
                    panel_width: 615,
                    panel_height: 400

    //            show_overlays: true
    //            panel_width: 800,
    //            panel_height: 350,
    //            frame_width: 160,
    //            frame_height: 70
    //            transition_interval: 0
    //            Animation Options
    //            transition_speed :	800 	//INT 	duration of panel/frame transition (in milliseconds)
    //            transition_interval: 	4000 	//INT 	delay between panel/frame transitions (in milliseconds)
    //            easing :	’swing’ 	//STRING 	easing method to use for animations (jQuery provides ’swing’ or ‘linear’, more available with jQuery UI or Easing plugin)
    //            pause_on_hover :	false 	//BOOLEAN 	flag to pause slideshow when user hovers over the gallery
    //            Panel Options:
    //            show_panels :	true 	//BOOLEAN 	flag to show or hide panel portion of gallery
    //            panel_width :	600 	//INT 	width of gallery panel (in pixels)
    //            panel_height : 400 	//INT 	height of gallery panel (in pixels)
    //            panel_animation :	‘crossfade’ 	//STRING 	animation method for panel transitions (crossfade,fade,slide,zoomOut,none)
    //            overlay_opacity :	0.7 	//FLOAT 	transparency for panel overlay (1.0 = opaque, 0.0 = transparent)
    //            overlay_position :	‘bottom’ 	//STRING 	position of panel overlay (bottom, top)
    //            panel_scale :	‘crop’ 	STRING 	//cropping option for panel images (crop = scale image and fit to aspect ratio determined by panel_width and panel_height, nocrop = scale image and preserve original aspect ratio)
    //            show_panel_nav :	true 	//BOOLEAN 	flag to show or hide panel navigation buttons
    //            show_overlays :	false 	//BOOLEAN 	flag to show or hide panel overlays
    //            Filmstrip Options
    //            show_filmstrip :	true 	//BOOLEAN 	flag to show or hide filmstrip portion of gallery
    //            frame_width :	60 	INT 	//width of filmstrip frames (in pixels)
    //            frame_height : 40 	INT 	//width of filmstrip frames (in pixels)
    //            start_frame :	1 	INT 	//index of panel/frame to show first when gallery loads
    //            filmstrip_size :	3 	//INT 	number of frames to show in filmstrip-only gallery
    //            frame_opacity :	0.3 	//FLOAT 	transparency of non-active frames (1.0 = opaque, 0.0 = transparent)
    //            filmstrip_style :	’scroll’ 	//STRING 	type of filmstrip to use (scroll, show all)
    //            filmstrip_position :	‘bottom’ 	//STRING 	position of filmstrip within gallery (bottom, top, left, right)
    //            show_filmstrip_nav :	true 	//BOOLEAN 	flag indicating whether to display navigation buttons
    //            frame_scale :	‘crop’ 	STRING 	//cropping option for filmstrip images (same as above)
    //            frame_gap :	5 	INT 	//spacing between frames within filmstrip (in pixels)
    //            show_captions :	false 	//BOOLEAN 	flag to show or hide frame captions
    //            Pointer Options
    //            pointer_size 	8 :	INT 	//Height of frame pointer (in pixels)
    //            animate_pointer :	true 	//BOOLEAN 	flag to animate pointer or move it instantly to target frame
            });

        });
    </script>

    <div id="smaugv-others">
    <h2>Galleries</h2>
    <div>
        <div>
            <ul>
                <?php foreach ($galleryPager->getResults() as $nb=>$g) { ?>
                <?php echo $nb==2 ? "</ul><ul>":"" ?>
                    <li>
                      <!-- this way we remember where the user is (gallery and page -->
                        <a href="<?php echo preg_replace("/\?[a-z\-&=0-9]+/","",$_SERVER["REQUEST_URI"]) ?>?gallery=<?php echo $g->getSlug() ?><?php echo isset($_GET["page"])? "&page=".$_GET["page"]:""; ?>"
                           style="background-image:url(<?php echo $g->getPhotoDefault() ?>);">
                            <span class="disposition alpha60"><?php echo $g->getDescription() ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

    <div style="float: right">
        <?php if ($galleryPager->haveToPaginate()){ ?>
            <ul class="pagination ball">
                <?php foreach ($galleryPager->getLinks() as $page){ ?>
                  <li <?php echo $page == $galleryPager->getPage() ? "class='current'": ""; ?>>
                      <!-- this way we remember where the user is (gallery and page -->
                      <a href="<?php echo preg_replace("/\?[a-z\-&=0-9]+/","",$_SERVER["REQUEST_URI"]) ?><?php echo isset($_GET["gallery"])? "?gallery=".$_GET["gallery"]."&":"?"; ?>page=<?php echo $page ?>">
                          <span><?php echo $page ?></span>
                      </a>
                  </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
<?php }else{ ?>
<?php echo __("No content yet"); ?>
<?php } ?>
