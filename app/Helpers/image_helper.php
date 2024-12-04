<?php

    function cropAndCompressImage($filePath)
    {
        // Load the Image Library
        $image = \Config\Services::image();

        // Crop the image (Example: crop 50px from left and 50px from top)
        $image->withFile($filePath)
              ->crop(500, 500, 100, 100) // Crop from (50, 50) position with width and height of 100px
              ->save($filePath);

        // Now compress the cropped image with a quality of 75%
        $image->withFile($filePath)
              ->save($filePath, 75); // Compress with 75% quality

        return true;
    }
