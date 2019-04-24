<template>
    <div class="sns-wrap">
        <a href="https://twitter.com/wim_web" class="sns twitter" target="_brank">
            <i class="fab fa-twitter icon"></i>Twitter
        </a>
        <a href="https://github.com/wim-web" class="sns github" target="_brank">
            <i class="fab fa-github icon"></i>Github
        </a>
    </div>
</template>

<style lang="scss" scoped>
.sns {
    display: block;
    padding: 0.2em 1em;
    text-decoration: none;
    border-radius: 3px;
    font-size: calc(26px + 1vw);
    margin-bottom: 5px;
}
.sns-wrap {
    padding: 10px;
}

.twitter {
    color: #67c5ff;
    border: solid 2px #67c5ff;
}

.github {
    color: #fdeb4a;
    border: solid 2px #fdeb4a;
}

.icon {
    font-size: calc(18px + 1vw);
}

@media screen and (min-width: 768px) {
    .sns {
        font-size: 34px;
        margin-bottom: 10px;
        transition: .5s;
    }

    .twitter:hover {
        background-color: #67c5ff;
        color: #fff;
    }

    .github:hover {
        background-color: #fdeb4a;
        color: #fff;
    }

    .icon {
        font-size: 25px;
    }
}
</style>



