<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 22:49
 */

namespace App\Helpers\Parsers;


use App\Product;
use Illuminate\Support\Facades\DB;

class XmlParser implements Parser
{
    protected $products = [];
    protected $xmlFile;
    public $xmlData;

    public function __construct($xmlFile)
    {
        $this->xmlFile = $xmlFile;
    }

    public function read()
    {
        // TODO: Implement read() method.
        if (!file_exists($this->xmlFile)) {
            throw new \Exception('File not found!');
        }
        try {
            $xmlString = file_get_contents($this->xmlFile);
            $this->xmlData = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOCDATA);

        } catch (\Exception $e) {
            echo 'Throw new custom exeption: ', $e->getMessage();
        }
        return $this->xmlData;

    }

    public function parse()
    {
        // TODO: Implement parse() method.
        $product = [];
        foreach ($this->xmlData->Каталог->Товары->Товар as $element) {
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
                        $product['barcode'] = json_encode((string)$val);
                        break;
                    case $key === 'Артикул':
                        $product['vendor_code'] = (string)$val;
                        break;
                    case $key === 'Ингредиенты':
                        $product['ingredients'] = json_encode(explode(',', trim($val)));
                        break;
                    case $key === 'КоличествоПорций':
                        $product['portions_count'] = (integer)$val;
                        break;
                    case $key === 'ПоставленнаяЦель':
                        $product['goals'] = json_encode(explode(',', trim($val)));
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
                        $product['status'] = (integer)$val;
                        break;
                    case $key === 'ХарактеристикиТовара':
                        $newArray = '';
                        $block = [];

//                        foreach ($val->ХарактеристикаТовара as $element) {
                            $tempValues =  explode(',', trim($val->ХарактеристикаТовара->Значение));
                            $block[(string)$val->ХарактеристикаТовара->Наименование] =  array_map(array($this, 'trimElement'), $tempValues);
                            $block['quantity'] =  explode(',', trim($val->ХарактеристикаТовара->Количество));
                            $newArray .= json_encode($block);
//                        }
                        if($newArray !== '') {
                            $product['attributes'] = $newArray;
                        } else {
                            $product['attributes'] = null;
                        }
                        $newArray = '';
                        break;
                    default:
                        $product['slug'] = '';
                        break;
                }
            }
            $this->products[] = $product;
            $product = [];
        }
    }

    protected function trimElement($n)
    {
        return trim($n);
    }

    public function writeProducts()
    {
        $newProduct = new Product();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::query()->truncate();
        foreach ($this->products as $product) {
            $newProduct::create($product);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}