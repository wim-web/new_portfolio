<template>
    <button :class="this.value">
            <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        value: {
            type: String,
            required: true,
        }
    }
}
</script>

<style lang="scss" scoped>

@mixin btn($color) {
    color: #fff;
    border: 1px solid $color;
    padding: 6px 12px;
    font-size: 16px;
    background-color: $color;
    border-radius: 4px;
    transition: .3s;
    @media screen and (min-width: 768px) {
        &:hover {
            background-color: blue;
            color: $color;
            background-color: #fff;
        }
    }
}

.update {
    @include btn(#f0e54e);
}

.delete {
    @include btn(#d9534f);
}

.logout {
    @include btn(#9e9e9e);
}

.register {
    @include btn(#33fa7f);
}

.submit {
    @include btn(#2cd1fa);
}

.close {
    @include btn(#fa772c);
}

</style>