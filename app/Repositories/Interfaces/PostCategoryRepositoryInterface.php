<?php

namespace App\Repositories\Interfaces;

interface PostCategoryRepositoryInterface
{

    /**
     * Get's Model Instance
     *
     * @param int
     */
    public function model();


    /**
     * Create`s new post category
     *
     * @param int
     */
    public function create(array $data);



    /**
     * Get's a post category by it's ID
     *
     * @param int
     */
    public function find($id);

    /**
     * Get's all post categories.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post category.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a post category.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
