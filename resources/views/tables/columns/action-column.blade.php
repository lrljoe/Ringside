<div class="menu" x-data="{
    open: false,
    toggle() {
        if (this.open) {
            return this.close()
        }

        this.$refs.button.focus()

        this.open = true
    },
    close(focusAfter) {
        if (!this.open) return

        this.open = false

        focusAfter && focusAfter.focus()
    }
}" x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']">
    <div class="menu-item menu-item-dropdown" :class="open ? 'show' : ''">
        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
            class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
            <i class="ki-filled ki-dots-vertical"></i>
        </button>
        <div class="menu-dropdown menu-default w-full max-w-[175px]" x-ref="panel" x-show="open"
            x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
            :class="open ? 'show' : 'hidden'">
            @if ($links['view'] ?? true)
                <div class="menu-item">
                    <a href="{{ route($path . '.show', $rowId) }}">
                        <span class="menu-icon">
                            <i class="ki-filled ki-search-list"></i>
                        </span>
                        <span class="menu-title">View</span>
                    </a>
                </div>
            @endif

            <div class="menu-separator"></div>

            @if ($links['edit'] ?? true)
                <div class="menu-item">
                    <a href="{{ route($path . '.edit', $rowId) }}">
                        <span class="menu-icon">
                            <i class="ki-filled ki-pencil"></i>
                        </span>
                        <span class="menu-title">Edit</span>
                    </a>
                </div>
            @endif

            @if ($links['delete'] ?? true)
                <div class="menu-item">
                    <form action="{{ route($path . '.destroy', $rowId) }}" class="d-inline" method="POST" x-data
                        @submit.prevent="if (confirm('Are you sure you want to delete this user?')) $el.submit()">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-link">
                            <i class="fa-solid fa-trash"></i>
                            Remove
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
