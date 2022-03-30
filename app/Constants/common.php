<?php

namespace App\Constants;

class Common{
  const ORDER_LATER = '0'; //新しい順
    const ORDER_OLDER = '1'; //古い順
    const ORDER_LIKE = '2'; //いいね順
    const ORDER_SELL = '3'; //取引中（取引中を除くソートを作るために使用）

    const ORDER_LIST = [
        'later' => self::ORDER_LATER,
        'older' => self::ORDER_OLDER,
        'like' => self::ORDER_LIKE,
        'sell' => self::ORDER_SELL
    ];
}
