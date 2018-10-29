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
    const MAX_SIZE = 1000000;
    const ALLOWED_EXTENSIONS = ['png', 'gif', 'jpg', 'jpeg'];

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

        $categoryIds = array_column($categories, 'id');
        $monthsNumber = array_column($months, 'number_month');


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $postName=>$postValue){
                $cleanPost[$postName] = trim($postValue);
            }
            if (!in_array($cleanPost['category_id'],$categoryIds)){
                $errors['category_error'] = "Veuillez entrer une categorie valide.";
            }
            if (!preg_match("/^[_a-zA-Z0-9- ]+$/" ,$cleanPost['name'])){
                $errors['name_error'] = "Veuillez entrer un nom valide.";
            }

            if (!in_array($cleanPost['product_begin'],$monthsNumber)){
                $errors['begin_error'] = "Veuillez entrer un mois valide.";
            }
            if (!in_array($cleanPost['product_end'],$monthsNumber)){
                $errors['end_error'] = "Veuillez entrer un mois valide.";
            }
            if (empty($cleanPost['category_id'])) {
                $errors['category_error'] = 'Veuillez renseigner une catégorie au produit';
            }
            if (empty($cleanPost['name'])) {
                $errors['name_error'] = 'Veuillez renseigner un nom au produit';
            }
            if (empty($cleanPost['product_begin'])) {
                $errors['begin_error'] = 'Veuillez renseigner un mois au produit';
            }
            if (empty($cleanPost['product_end'])) {
                $errors['end_error'] = 'Veuillez renseigner un nom au produit';
            }
            if (empty($cleanPost['description_produit'])) {
                $errors['description_error'] = 'Veuillez ajouter une description';
            }
            if (empty($_FILES['image']['name'])){
                $errors['image_error'] = 'Veuillez ajouter une image';
            }
            if (!empty($_FILES['image']['name'])) {
                $dir = 'assets/images/bdd/';
                $files = basename($_FILES['image']['name']);
                $size = filesize($_FILES['image']['tmp_name']);
                $extension = substr(strrchr($_FILES['image']['name'], '.'),1);
                if (!in_array($extension, self::ALLOWED_EXTENSIONS)) {
                    $errors['extension_error'] = 'Le format du fichier doit être de type ' . implode(self::ALLOWED_EXTENSIONS,',') . ' .';
                }
                if ($size > self::MAX_SIZE) {
                    $errors['size_error'] = 'Le poids du fichier doit être inférieur à'. self::MAX_SIZE /1000000 .' Mo';
                }
                if (!isset($error)) {
                    $files = uniqid('image', true) . '.' .$extension;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir . $files)) {
                        $_FILES['uniqImage'] = $dir . $files;
                    }

                } else {
                    return $error;
                }
            }

            if (empty($errors)) {
                $productManager = new ProductManager($this->getPdo());
                $product = new Product();
                $product->setName($cleanPost['name']);
                $product->setProductBegin($cleanPost['product_begin']);
                $product->setProductEnd($cleanPost['product_end']);
                $product->setImage($_FILES['uniqImage']);
                $product->setDescriptionProduct($cleanPost['description_produit']);
                $product->setCategoryId($cleanPost['category_id']);

                $id = $productManager->insert($product);
                header('Location:/admin/list');
            }
        }
        return $this->twig->render('add.html.twig',
            [
                'categories' => $categories,
                'months' => $months,
                'POST' => $cleanPost,
                'errors' => $errors,

            ]);
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function listItem()
    {
        $productManager = new ProductManager($this->getPdo());
        $productsByCategories = $productManager->showByCategory();

        foreach ($productsByCategories as $productByCategory){
            $category = $productByCategory['category_title'];
            $categoriesWithProducts[$category][] = $productByCategory;
        }

        return $this->twig->render('listItem.html.twig',
            [
                'categoriesWithProducts'=>$categoriesWithProducts,
            ]);
    }

}