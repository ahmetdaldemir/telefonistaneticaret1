<?php

namespace App\Console\Commands;

use App\Locators\VirtualMarketServiceLocator;
use App\Models\VirtualMarketAttribute;
use App\Models\VirtualMarketCategory;
use App\Models\VirtualMarketSetting;
use App\Modules\Trendyol\TrendyolService;
use Illuminate\Console\Command;

class TrendyolCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:trendyol';
    public $serviceParams;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle(): void
    {
        $data['virtualmarketId'] = 2;
        $settings = VirtualMarketSetting::where([
            'virtual_market_id' => 2, /* saas yapı için kullanılıyor !!! */
            'company_id' => 1,
        ])->first();
        $serviceSelect = new VirtualMarketServiceLocator();
        $this->serviceParams = $serviceSelect->getPlatformService($data['virtualmarketId'], $settings);
        $servicePost = $this->serviceParams->getCategories();
        $categories = $servicePost->getCategory();
        $this->setCategory($this->serviceParams,$data['virtualmarketId'], $categories['categories']);
    }

    public function setCategory($serviceParams, $virtual_market_id, $categories): void
    {
        // Kategorileri 100'lük parçalara ayırarak işlem yapalım
        $chunks = array_chunk($categories, 100);

        foreach ($chunks as $chunk) {
            foreach ($chunk as $category) {
                $servicePosta = $serviceParams->getAttributes($category['id']);
                $attibutelist = $servicePosta->getAttribute();
                $this->setAttribute($virtual_market_id, $attibutelist);

                // Kategoriyi veritabanına ekle veya güncelle
                $cat = VirtualMarketCategory::updateOrCreate(
                    ['virtual_market_category_id' => $category['id'], 'virtual_market_id' => $virtual_market_id], // Mevcut bir kategori varsa güncellemek için id'yi kullan
                    ['name' => $category['name'], 'parent_id' => $category['parentId'] ?? 0]
                );

                // Alt kategorileri kaydetmek için rekürsif olarak fonksiyonu çağır
                if (!empty($category['subCategories'])) {
                    $this->setCategory($serviceParams, $virtual_market_id, $category['subCategories']);
                }
            }
            // Her chunk işlendikten sonra biraz bekleyelim
            sleep(5);
        }
    }

    public function setAttribute($virtual_market_id, $attribute)
    {
        if (!empty($attribute)  || !empty($attribute['categoryAttributes'])) {
            foreach ($attribute['categoryAttributes'] as $item) {
                VirtualMarketAttribute::updateOrCreate(
                    ['virtual_market_attribute_id' => $item['attribute']['id'], 'categoryId' => $item['categoryId'], 'virtual_market_id' => $virtual_market_id], // Mevcut bir kategori varsa güncellemek için id'yi kullan
                    ['name' => $item['attribute']['name'], 'required' => $item['required'] == 0 ? 'false' : 'true',
                        'varianter' => $item['varianter'] == 0 ? 'false' : 'true',
                        'slicer' => $item['slicer'] == 0 ? 'false' : 'true',
                        'attributeValues' => $item['attributeValues']
                    ]
                );
            }
        }
    }

}
