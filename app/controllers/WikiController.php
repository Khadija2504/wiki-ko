<?php
class wikiController{
    public function search()
    {
        $search = array(
            'wiki_title' => '%' . $_POST['word'] . '%',
        );

        $result = wiki::getsearch($search);
        return $result;

    }
}
?>