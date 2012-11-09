<?php
class smaugvSlotComponents extends aSlotComponents
{
  public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new smaugvSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    //todo make it less heavy, just one image, the description, paginated and just the "is active"
    $this->galleryPager = Gallery::getGalleriesPager(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_pager_max",15));
    if(!empty($_GET["gallery"])){
        $this->gallery =   Doctrine::getTable("Gallery")->findOneBySlug($_GET["gallery"]);
    }else{
        $this->gallery =   Doctrine::getTable("Gallery")->createQuery("g")
            ->where("g.is_active = ?",true)
            ->orderBy("g.created_at DESC")
            ->fetchOne();
    }
  }
}
