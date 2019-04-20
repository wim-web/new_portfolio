<template>
    <div>
        <form @submit.prevent="">
            <label for="desc">desc</label>
            <textarea id="desc" cols="30" rows="10"></textarea>
            <button>Update</button>
        </form>
        <form @submit.prevent="">
            <select name="" id="">
                <option value="all">All</option>
                <option value="front">Front</option>
                <option value="back">Back</option>
                <option value="others">Others</option>
            </select>
            <button>Update</button>
            <button>Delete</button>
        </form>
    </div>
</template>
