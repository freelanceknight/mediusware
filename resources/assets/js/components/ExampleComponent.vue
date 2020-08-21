<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        mounted() {
            console.log('Component mounted.')
            let uri = 'http://localhost/mediusware/get/buffer-posts';
            window.axios.get(uri).then(response => {
                this.posts = response.data.message;
                alert(response.data);
            });

        }


    }
</script>
