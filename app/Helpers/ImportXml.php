<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 19:01
 */

namespace App\Helpers;


use App\Product;
use Exception;

class ImportXml
{
    protected $products = [];
    protected $xmlFile;

    public function __construct($xmlFile)
    {
        $this->xmlFile = $xmlFile;
    }

    /**
     * @param $file
     * @return \SimpleXMLElement
     * @throws Exception
     */
    public function readFile($file)
    {
        if (!file_exists($this->xmlFile)) {
            throw new Exception('File not found!');
        }
        try {
            $xmlString = file_get_contents($this->xmlFile);
            $xmlData = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOCDATA);

        } catch (Exception $e) {
            echo 'Throw new custom exeption: ', $e->getMessage();
        }

        return $xmlData;
    }

    /**
     * @param $data
     * @return array
     */
    public function parseXmlProducts($data): array
    {
        $product = [];
        $products = [];
        foreach ($data[0]->Каталог->Товары->Товар as $element) {
            foreach ($element as $key => $val) {

                switch ($key) {
                    case $key === 'Ид':
                        $product['inner_id'] = (string)$val;
                        break;
                    case $key === 'Производитель':
                        $product['vendor'] = (string)$val;
                        break;
                    case $key === 'Наименование':
                        $product['name'] = (string)$val;
                        break;
                    case $key === 'ПолноеНаименование':
                        $product['full_name'] = (string)$val;
                        break;
                    case $key === 'ВесПозиции':
                        $product['weight'] = (string)$val;
                        break;
                    case $key === 'Упаковка':
                        $product['packing'] = (string)$val;
                        break;
                    case $key === 'Штрихкод':
                        $product['barcode'] = json_encode((array)$val);
                        break;
                    case $key === 'Артикул':
                        $product['vendor_code'] = (string)$val;
                        break;
                    case $key === 'Ингредиенты':
                        $product['ingredients'] = json_encode((array)$val);
                        break;
                    case $key === 'КоличествоПорций':
                        $product['portions_count'] = (integer)$val;
                        break;
                    case $key === 'ПоставленнаяЦель':
                        $product['goals'] = json_encode((string)$val);
                        break;
                    case $key === 'Наличие':
                        $product['availability'] = (integer)$val;
                        break;
                    case $key === 'ШейкерВПодарок':
                        if ($val === '+') {
                            $product['present'] = 1;
                        } else {
                            $product['present'] = 0;
                        }
                        break;
                    case $key === 'БесплатнаяДоставка':
                        if ($val === '+') {
                            $product['free_delivery'] = 1;
                        } else {
                            $product['free_delivery'] = 0;
                        }
                        break;
                    case $key === 'ПодЗаказ':
                        if ($val === '+') {
                            $product['order_only'] = 1;
                        } else {
                            $product['order_only'] = 0;
                        }
                        break;
                    case $key === 'Розетка_Пол':
                        $product['gender'] = (string)$val;
                        break;
                    case $key === 'Розетка_РазмерПорции':
                        $product['portion_size'] = (integer)$val;
                        break;
                    case $key === 'Розетка_СтранаПроизводитель':
                        $product['vendors_country'] = (string)$val;
                        break;
                    case $key === 'Розетка_СтранаРегистрацииБренда':
                        $product['vendor_country_brand'] = (string)$val;
                        break;
                    case $key === 'ФормаВыпуска':
                        $product['form'] = (string)$val;
                        break;
                    case $key === 'ЦенаВВалюте':
                        $product['price'] = (integer)$val;
                        break;
                    case $key === 'ЦенаСоСкидкой':
                        $product['discount_price'] = (integer)$val;
                        break;
                    case $key === 'Валюта':
                        $product['currency'] = (string)$val;
                        break;
                    case $key === 'ВнешнийКод':
                        $product['outer_code'] = (string)$val;
                        break;
                    case $key === 'Описание':
                        $product['description'] = (string)$val;
                        break;
                    case $key === 'Статус':
                        $product['status'] = (string)$val;
                        break;
                    case $key === 'ХарактеристикиТовара':
                        foreach ($val->ХарактеристикаТовара as $element) {
                            $newArray[] = (array)$element;
                        }
                        $product['attributes'] = $newArray;
                        $newArray = [];
                        break;
                    default:
                        break;
                }
            }
            $products[] = $product;
            $product = [];
        }
        return $products;
    }

    public function writeToDb($products)
    {
        foreach ($products as $product) {
            Product::updateOrCreate($product);
        }

    }

}