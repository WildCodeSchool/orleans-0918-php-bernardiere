<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 23/10/18
 * Time: 19:06
 */

namespace Controller;
use Model\Product;
use Model\ProductManager;
use Model\CategoryManager;
use Model\MonthManager;

class AdminController extends AbstractController
{


    /**
     * Display product listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function adminIndex()
    {
        return $this->twig->render('index_admin.html.twig');
    }
    /**
     * Display product creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        $categoryManager = new CategoryManager($this->getPdo());
        $categories = $categoryManager->selectAll();

        $monthManager = new MonthManager($this->getPdo());
        $months = $monthManager->selectAll();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!preg_match("/^[_0-9- ]+$/" ,$_POST['category_id'])){
                $errors['category_error'] = "Veuillez entrer une categorie valide.";
            }
            if (!preg_match("/^[_a-zA-Z0-9- ]+$/" ,$_POST['name'])){
                $errors['name_error'] = "Veuillez entrer un nom valide.";
            }
            if (!preg_match("/^[_0-9- ]+$/" ,$_POST['product_begin'])){
                $errors['begin_error'] = "Veuillez entrer un mois valide.";
            }
            if (!preg_match("/^[_0-9- ]+$/" ,$_POST['product_end'])){
                $errors['end_error'] = "Veuillez entrer un mois valide.";
            }
            if (empty($_POST['category_id'])) {
                $errors['category_error'] = 'Veuillez renseigner une catégorie au produit';
            }
            if (empty($_POST['name'])) {
                $errors['name_error'] = 'Veuillez renseigner un nom au produit';
            }
            if (empty($_POST['product_begin'])) {
                $errors['begin_error'] = 'Veuillez renseigner un mois au produit';
            }
            if (empty($_POST['product_end'])) {
                $errors['end_error'] = 'Veuillez renseigner un nom au produit';
            }
            if (empty($_POST['description_produit'])) {
                $errors['description_error'] = 'Veuillez ajouter une description';
            }
            if (empty($_FILES['image']['name'])){
                $errors['image_error'] = 'Veuillez ajouter une image';
            }
            if (!empty($_FILES['image']['name'])) {
                $dir = 'assets/images/bdd/';
                $files = basename($_FILES['image']['name']);
                $max_size = 1000000;
                $size = filesize($_FILES['image']['tmp_name']);
                $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                $extension = strrchr($_FILES['image']['name'], '.');
                if (!in_array($extension, $extensions)) {
                    $errors['extension_error'] = 'Le format du fichier doit être de type png, gif, jpg, jpeg';
                }
                if ($size > $max_size) {
                    $errors['size_error'] = 'Le poids du fichier doit être inférieur à 1 Mo';
                }
                if (!isset($error)) {
                    $files = uniqid('image', true) . $extension;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir . $files)) {
                        $_FILES['uniqImage'] = $dir . $files;
                    }

                } else {
                    echo $error;
                }
            }

            if (count($errors) == 0) {
                $productManager = new ProductManager($this->getPdo());
                $product = new Product();
                $product->setName($_POST['name']);
                $product->setProductBegin($_POST['product_begin']);
                $product->setProductEnd($_POST['product_end']);
                $product->setImage($_FILES['uniqImage']);
                $product->setDescriptionProduct($_POST['description_produit']);
                $product->setCategoryId($_POST['category_id']);

                $id = $productManager->insert($product);
                header('Location:/Admin/items');
            }
        }
        return $this->twig->render('Admin/add.html.twig',
            [
                'categories' => $categories,
                'months' => $months,
                'POST' => $_POST,
                'errors' => $errors,

            ]);
    }

}