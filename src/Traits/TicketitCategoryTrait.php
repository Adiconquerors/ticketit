<?php

namespace Kordy\Ticketit\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait TicketitCategoryTrait
{
    /**
     * Get all agents belong to this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agents()
    {
        return $this->belongsToMany(
            app('TicketitAgent'), 'ticketit_category_agent', 'category_id', 'agent_id'
        );
    }

    /**
     * Get the  admin agent of this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(app('TicketitAgent'), 'admin_id');
    }

    /**
     * Get tickets belongs to this category.
     *
     * @return HasMany
     */
    public function tickets()
    {
        return $this->hasMany(app('TicketitTicket'), 'category_id');
    }

    /**
     * Add an agent or more to this category.
     *
     * @param int|object|array $agent
     */
    public function addAgent($agent)
    {
        $this->agents()->attach($agent);
    }

    /**
     * Assign an agent as an admin to this category.
     *
     * @param int $agent_id
     *
     * @return $this
     */
    public function assignAdmin($agent_id)
    {
        $this->admin_id = $agent_id;
        $this->save();

        return $this;
    }

    /**
     * remove an agent or more from this category.
     *
     * @param int|object|array $agent
     */
    public function removeAgent($agent)
    {
        $this->agents()->detach($agent);
    }
}
