<?php
class PreviewProvider
{
    private $con, $username;

    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;
    }

    public function createPreviewVideo($entity = null)
    {
        if ($entity === null) {
            $entity = $this->randomEntity();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();

        return  <<< PREVIEW

        <div class="previewContainer">
            <img src='$thumbnail' class='previewImage' hidden>
            <video autoplay muted class='previewVideo' onended="previewEnded()">
                <source src='$preview' type='video/mp4'>
            </video>

            <div class='previewOverlay'>
                
                <div class="mainDetails">
                    <h3>$name</h3>

                    <div class='buttons'>
                        <button><i class='fas fa-play'></i> Play</button>
                        <button onClick="volumeToggle(this)"><i class="fas fa-volume-mute"></i></button>
                    </div>
                </div>
            </div>
        </div>

PREVIEW;
    }

    public function createEntityPreviewSquare(Entity $entity) {
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return <<< PREVIEW
            <a href="entity.php?id=$id">
                <div class="previewContainer small">
                    <img src="$thumbnail" title="$name">
                </div>
            </a>
PREVIEW;
        
    }


    
    private function randomEntity()
    {
        try {
            $entity = EntityProvider::getEntities($this->con, null, 1);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $entity[0];
    }
}