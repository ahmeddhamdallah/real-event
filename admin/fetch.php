<?php
include("memberClass.php");
$members = new Member();
$allMembers = $members->getAllMembers();
echo json_encode(buildTree($allMembers, $parentId = 0));
function buildTree(array $elements, $parentId = 0) {
    $branch = array();
    foreach ($elements as $element) {
        if ($element['parentId'] == $parentId) {
        	$element['text'] = $element['name'];
            $children = buildTree($elements, $element['memberId']);
            if ($children) {
                $element['nodes'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}


?>