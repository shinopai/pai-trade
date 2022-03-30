class ImageService{
  public static function upload($imageFile, $folderName){
    $fileName=uniqid(rand().'_'); //ファイル名をランダムに生成
            $extension=$imageFile->extension(); //拡張子を判別
            $fileNameToStore=$fileName.'.'.$extension; //上二つの文字列をつなげる
            $resizedImage=InterventionImage::make($imageFile)->resize(400, 400)->encode();
            //InterventionImageがリサイズしてくれる
            Storage::put('public/'.$folderName.'/'.$fileNameToStore, $resizedImage);
            //storageフォルダのpublicフォルダに$folderNameを作成（今回はProfiles）して保存
        return $fileNameToStore;
  }
}
