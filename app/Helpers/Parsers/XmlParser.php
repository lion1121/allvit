<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 22:49
 */

namespace App\Helpers\Parsers;


use App\ProdCategory;
use App\Product;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class XmlParser implements Parser
{
    use RecursiveAddCategory;

    protected $products = [];
    public $categories = [];
    protected $xmlFile;
    protected $xmlData;
    protected $availableAttributes = ['Вкус', 'Размер', 'Цвет'];

    public function __construct($xmlFile)
    {
        $this->xmlFile = $xmlFile;
    }

    public function read()
    {
        // TODO: Implement read() method.
        if (!file_exists($this->xmlFile)) {
//            $log = new Logger('parserLogger');
//            $log->pushHandler(new StreamHandler(storage_path() . '/logs/parser_logs.log', Logger::INFO));
//            $log->addAlert('Parser error: Source not found. Check url or login password!');
            throw new Exception('File not found! Path to file has to be correct!');
        }
        try {
            $xmlString = file_get_contents($this->xmlFile);
            $this->xmlData = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOCDATA);

        } catch (\Exception $e) {
            echo 'Throw new custom exception: ', $e->getMessage();
        }

        return $this->xmlData;

    }


    public function parse()
    {
        // TODO: Implement parse() method.

        if (isset($this->xmlData->Классификатор->ГруппыСайта->ГруппаСайта)) {
            foreach ($this->xmlData->Классификатор->ГруппыСайта->ГруппаСайта as $categoryElement) {

                $this->addCategory($categoryElement);
            }
        }


        $product = [];
        foreach ($this->xmlData->Каталог->Товары->Товар as $productElement) {
            foreach ($productElement as $key => $val) {

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
                        $tempIngerients = explode(',', $val);
                        $product['ingredients'] = count($tempIngerients) > 1 ? json_encode(array_map(array($this, 'trimStrElement'), $tempIngerients)) : null;
                        break;
                    case $key === 'КоличествоПорций':
                        $product['portions_count'] = (integer)$val;
                        break;
                    case $key === 'ПоставленнаяЦель':
                        $tempGoals = explode(',', $val);
                        $product['goals'] = count($tempGoals) > 1 ? json_encode(array_map(array($this, 'trimStrElement'), $tempGoals)) : null;;
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
                        $tempValues = explode(',', trim($val->ХарактеристикаТовара->Значение));
                        $tempQuantity = explode(',', $val->ХарактеристикаТовара->Количество);
                        $block[(string)$val->ХарактеристикаТовара->Наименование] = array_map(array($this, 'trimStrElement'), $tempValues);
                        $block['quantity'] = array_map(array($this, 'trimIntElement'), $tempQuantity);

                        //Check if values not present in availableAttributes write null
                        if (in_array(array_keys($block)[0], $this->availableAttributes)) {
                            $newArray .= json_encode($block);
                            $product['attributes'] = $newArray;
                        } else {
                            $product['attributes'] = null;
                        }
                        $newArray = '';
                        break;
                    case $key === 'ГруппыСайта':
                        if ((string) $val === ''){
                            $product['categories'] = (array) 6;
                        } else {
                            $categories = (array)$val;
//                        foreach ($categories as $category) {
                            if (isset($categories['Ид'])) {
                                $product['categories'] = ProdCategory::where('inner_id', $categories['Ид'])->first()->id;
                            }
                        }
//                        }
                        break;
                    default:
                        break;
                }
            }
            $this->products[] = $product;
            $product = [];
        }


    }


    /**
     * Callback function
     * @param $n
     * @return string
     */
    protected function trimStrElement($n): string
    {
        return trim($n);
    }

    /**
     * Callback function
     * @param $n
     * @return int
     */
    protected function trimIntElement($n)
    {
        return (integer)trim($n);
    }

    public function writeCategories()
    {

    }

    /**
     * Update table if was changed and insert if not exists
     */
    public function writeProducts()
    {
        foreach ($this->products as $product) {
            $tempProduct = Product::updateOrCreate(['vendor_code' => $product['vendor_code']], $product);
            $product_id = $tempProduct->id;
            foreach ($product['categories'] as $category) {
                $lastProduct = Product::findOrFail($product_id);
                //Synchronize pivot table (category_product)
                $lastProduct->categories()->sync([$product_id => $category]);
            }
        }
    }
}