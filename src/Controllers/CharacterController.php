<?php
namespace StVivian\Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use StVivian\Models\CharacterModel;

class CharacterController
{
    private CharacterModel $model;
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);
        $this->model = new CharacterModel();
    }

    public function showCharacters(?string $filter = null, ?int $id = null): string
    {
        $characters = $this->model->getCharacters($filter, $id);
        return $this->twig->render('characters.html.twig', ['characters' => $characters]);
    }

    public function showForm(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processForm();
        }
        return $this->twig->render('form.html.twig');
    }

    public function processForm(): void
    {
        // first we deal with the file
        if (isset($_FILES['picture'])) {
            $errors = [];
            $filename = $_FILES['picture']['name'];
            $fileTMP = $_FILES['picture']['tmp_name'];
            $fileDir = 'assets/characters/' . $filename;
            if(empty($errors)) {
                move_uploaded_file($fileTMP, $fileDir);
            }
        }
        // we fetch the data we want, then validate them
        $character = [
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),
            'nickname' => trim($_POST['nickname']),
            'alias' => trim($_POST['alias']),
            'type_id' => trim($_POST['type_id']),
            'picture' => "$fileDir",
        ];
        $this->model->addCharacter($character);
        // TODO: without errors, we actually return the individual character we just added
    }
}