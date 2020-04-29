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

        $previewMarkup =  <<< PREVIEW

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

        echo $previewMarkup;
    }

    private function randomEntity()
    {
        $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return new Entity($this->con, $row);
    }
}