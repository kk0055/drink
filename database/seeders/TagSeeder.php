<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $attributeTags = [
            ["name" => "喉に沁みる"],
            ["name" => "ゴクゴク"],
            ["name" => "濃厚"],
            ["name" => "ピチピチ"],
            ["name" => "ハーモニー"],
            ["name" => "上品な味わい"],
            ["name" => "鉛のような味"],
            ["name" => "さわやか"],
            ["name" => "丸みのある"],
            ["name" => "少し荒い"],
            ["name" => "フルーティー"],
            ["name" => "さっぱり"],
            ["name" => "豊穣な味"],
            ["name" => "酸味"],
            ["name" => "芳醇"],
            ["name" => "辛口"],
            ["name" => "のどごし"],
            ["name" => "香り高い"],
            ["name" => "薄め"],
            ["name" => "気取った感じ"],
            ["name" => "コクのある"],
            // ["name" => "大雨の後の濁った川みたいな色"],
            ["name" => "甘い香り"],
            ["name" => "複雑"],
            ["name" => "まろやか"],
            ["name" => "クリーミー"],
            ["name" => "味がしない"],
            ["name" => "甘酸っぱい"],
            ["name" => "あっさり"],
            ["name" => "すっきり"],
            ["name" => "あまい"],
            ["name" => "おいしい"],
            ["name" => "苦い"],
            ["name" => "甘辛い"],
            ["name" => "まずい"],
            ["name" => "果肉"],
            ["name" => "やみつき"],
            ["name" => "おしゃれ"],
            ["name" => "淡泊"],
            ["name" => "繊細"],
            ["name" => "素朴な味"],
            ["name" => "ジューシー"],
            ["name" => "リッチ"],
            ["name" => "まったり"],
            ["name" => "しゅわっ"],
            ["name" => "香ばしい"],
            ["name" => "きりっとした"],
            ["name" => "ほっとする"],
            ["name" => "おふくろの"],
            ["name" => "春の味"],
            ["name" => "パンチがある"],
            ["name" => "衝撃的"],
            ["name" => "くせになる"],
            ["name" => "素材本来の"],
            ["name" => "絶妙な甘さ"],
            ["name" => "しつこくない"],
            ["name" => "ごはんが進む"],
            ["name" => "ミルキー"],
            ["name" => "未知の"],
            ["name" => "マイルド"],
            ["name" => "無骨な"],
            ["name" => "ヘルシーな"],
            ["name" => "今朝採れたて"],
            ["name" => "水っぽい"],
            ["name" => "薄味"],
            ["name" => "柑橘系"],
            ["name" => "風味豊か"],
            ["name" => "さわやか"],
  
          ];

          foreach ($attributeTags as $key => $value) {
            Tag::create($value);
          }
    }
}
