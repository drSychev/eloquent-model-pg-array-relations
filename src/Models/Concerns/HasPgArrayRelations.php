<?php

namespace Laragrad\Models\Concerns;

use Laragrad\Relations\HasManyInArray;
use Laragrad\Relations\BelongsToManyArrays;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait HasPgArrayRelations
{

    /**
     * Define a HasManyInArray relationship.
     *
     * @param  string  $related
     * @param  string  $localArrayField
     * @param  string  $relatedKey
     * @return \Laragrad\Relations\HasManyInArray
     */
    public function hasManyInArray($related, $arrayField = null, $relatedKey = null, $castAs = null)
    {
        $instance = $this->newRelatedInstance($related);

        $arrayField = $arrayField ?: $instance->getForeignKey().'s';

        $relatedKey = $relatedKey ?: $instance->getKeyName();

        return $this->newHasManyInArray(
            $instance->newQuery(), $this, $arrayField, $relatedKey, $castAs
        );
    }

    /**
     * Instantiate a new HasManyInArray relationship.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Model  $parent
     * @param  string  $arrayField
     * @param  string  $relatedKey
     * @return \Laragrad\Relations\HasManyInArray
     */
    protected function newHasManyInArray(Builder $query, Model $parent, $arrayField, $relatedKey, $castAs)
    {
        return new HasManyInArray($query, $parent, $arrayField, $relatedKey, $castAs);
    }

    /**
     * Define a BelongsToManyArrays relationship.
     *
     * @param  string  $related
     * @param  string  $arrayField
     * @param  string  $relatedKey
     * @return \Laragrad\Relations\BelongsToManyArrays
     */
    public function belongsToManyArrays($related, $arrayField = null, $relatedKey = null, $castAs = null)
    {
        $instance = $this->newRelatedInstance($related);

        $arrayField = $arrayField ?: $this->getForeignKey().'s';

        $relatedKey = $relatedKey ?: $this->getKeyName();

        return $this->newBelongsToManyArrays(
            $instance->newQuery(), $this, $arrayField, $relatedKey, $castAs
        );
    }

    /**
     * Instantiate a new BelongsToManyArrays relationship.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Model  $parent
     * @param  string  $arrayField
     * @param  string  $relatedKey
     * @return \Laragrad\Relations\BelongsToManyArrays
     */
    protected function newBelongsToManyArrays(Builder $query, Model $parent, $arrayField, $relatedKey, $castAs)
    {
        return new BelongsToManyArrays($query, $parent, $arrayField, $relatedKey, $castAs);
    }

}

?>