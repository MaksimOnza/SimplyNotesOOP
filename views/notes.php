<?php
/**
 * @var $messages array
 * @var $private_message array
 */

?>

<?php
foreach ($notes as $note) {
    if ($note['note'])
        print '<div id="display_message">
            <div id="text_message"><span id="view_message"> '
            . $note['note'] . '</span> <div id="view_date">'
            . date('Y-m-d', $note['time'] / 1000)
            . "\n" . date("H:i:s", $note['note'] / 1000) .
            '</div>
            <div id="tools_message">notes
                <div id="editing_message"></div>
                <div id="deleting_message"></div>
            </div>
        </div><br>';
}
?>