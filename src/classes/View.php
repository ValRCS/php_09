<?php
    class View {
        public function render($data = null) {
            $html = $this->getHeader();
            //TODO use $data when generating our HTML
            $html .= "<h1>Generating bunch of HTML</h1>";
            $html .= $this->getFooter();
            
            echo $html;
        }

        private function getHeader() {
            // $html = "<!DOCTYPE html>";
            // $html .= "more html but i am lazy so i will use heredoc";
            //https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
            $pagetitle = "My music page"; //TODO get title from config
            $stylefile = "style.css" ; //TODO get style from config
            $html = <<<MYLIMITER
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$pagetitle</title>
    <link rel="stylesheet" href="styles/$stylefile">
</head>
<body>
MYLIMITER;
            return $html;
        }

        private function getFooter() {
            $year = "2019"; //TODO get year dynamically
            $html = "<footer>(C)$year</footer>";
            $html .= "</body>";
            $html .= "</html>";
            return $html;
        }
    }