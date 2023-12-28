<?php
$exHtml = '<p><a>Tienhg2001</a></p>';
echo $exHtml . '<br/>';

const _EX_HTML = '<p><a>Tienhg2001</a></p>';
echo _EX_HTML . '<br/>';


$selectHtml = '<select>';
for ($i = 0; $i < 10000; $i++) {
  $selectHtml .= '<option>' . $i . '</option>';
}
$selectHtml .= '</select>';

echo $selectHtml . '<br/>';