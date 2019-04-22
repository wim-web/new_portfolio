<template>
    <div>
        <h2>about</h2>
    </div>
</template>

<script>
export default {
    
    created: function () {
        this.$store.dispatch('header/setIsSmall', true)
        this.$store.dispatch('header/setHeaderPlaceHolder', 'Enter top OR works')
    },
}
</script>