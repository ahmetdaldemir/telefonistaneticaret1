<?php

namespace App\Jobs;

use App\Models\VirtualMarketCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrendyolCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $virtualMarketId;
    protected $categories;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($virtualMarketId, $categories)
    {
        $this->virtualMarketId = $virtualMarketId;
        $this->categories = $categories;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->setCategory($this->virtualMarketId,$this->categories);
    }


    public function setCategory($virtual_market_id, $categories): void
    {

            foreach ($categories as $category) {
                //$servicePosta = $serviceParams->getAttributes($category['id']);
                // $attibutelist = $servicePosta->getAttribute();
                // $this->setAttribute($virtual_market_id, $attibutelist);

                // Kategoriyi veritabanına ekle veya güncelle
                VirtualMarketCategory::updateOrCreate(
                    ['virtual_market_category_id' => $category['id'], 'virtual_market_id' => $virtual_market_id], // Mevcut bir kategori varsa güncellemek için id'yi kullan
                    ['name' => $category['name'], 'parent_id' => $category['parentId'] ?? 0]
                );

                // Alt kategorileri kaydetmek için rekürsif olarak fonksiyonu çağır
                if (!empty($category['subCategories'])) {
                    $this->setCategory($virtual_market_id, $category['subCategories']);
                }
            }

    }
}
