<?php
declare(strict_types=1);

/**
 * Results array of items from Collection or Arrayable.
 *
 * @param  mixed  $items
 *
 * @return array
 */
function collect($items)
{
    if (is_array($items)) {

        return $items;

    } elseif ($items instanceof JsonSerializable) {

        return $items->jsonSerialize();

    } elseif ($items instanceof Traversable) {

        return iterator_to_array($items);

    } else {

        return (array) $items;
    }

}