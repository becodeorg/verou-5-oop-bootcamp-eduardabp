<?php

class Content
{
    public $title;
    public $text;
    public $type;
    public $isBreakingNews;

    public function __construct(string $title, string $text, string $type, bool $isBreakingNews = false) {
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
        $this->isBreakingNews = $isBreakingNews;
    }

    public function getTitle() {
        if ($this->isBreakingNews === true) {
            return "BREAKING: " . $this->title;
        } elseif ($this->type === "ad") {
            return strtoupper($this->title);
        } elseif ($this->type === "vacancy") {
            return $this->title . " - apply now!";
        } else {
            return $this->title;
        }
    }

    public function getText() {
        return $this->text;
    }
}

$website = [
    new Content("Is PHP dead?", "For a few years, the internet gurus are declaring the end of PHP. But the language seems to still be strong and ready to tackle the future.", "article"),
    new Content("A new framework for PHP developers", "Creators of Laravel just announced a new framework that promises to make the job of PHP developers a lot easier.", "article", true),
    new Content("Learn PHP fast!", "With our superpowered couse, you can learn PHP in 5 minutes! And it only costs $1.999.999,99!", "ad"),
    new Content("PHP developer", "We are looking for a motivated developer to join our PHP team. Salary is $3000 + benefits.", "vacancy"),
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Blog</title>
</head>
<body>
    <h1>PHP LIFE</h1>
    <br>
    <?php 
      foreach ($website as $content) {
        echo "<h2>" . $content->getTitle() . "</h2><br><p>" . $content->getText(). "</p><br><br>";
      };
    ?>
  
</body>
</html>