<?php
$ffmpeg = FFMpeg\FFMpeg::create();
$audio = $ffmpeg->open('track.mp3');

$format = new FFMpeg\Format\Audio\Flac();
$format->on('progress', function ($audio, $format, $percentage) {
    echo "$percentage % transcoded";
});

$format
    -> setAudioChannels(2)
    -> setAudioKiloBitrate(256);

$audio->save($format, 'track.flac');
?>