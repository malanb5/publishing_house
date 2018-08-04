<template>
    <div class="book-index">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book name</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Publish date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(book, index, key ) in books.data" :key="key">
                    <td>{{ index + 1 }}</td>
                    <td>{{ book.name }}</td>
                    <td>{{ book.author.name }}</td>
                    <td>{{ book.publisher.name }}</td>
                    <td>{{ book.published_at }}</td>
                    <td>
                        <button class="delete" @click="deleteBook(book)">
                            <font-awesome-icon icon="trash-alt" />
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "IndexBookComponent",
        props:[
            'props_books'
        ],
        data(){
            return {
                books: {}
            }
        },
        created(){
            this.books = JSON.parse(this.props_books);
        },
        methods:{
            deleteBook(book){
                console.log(book.name);
            }
        }
    }
</script>

<style scoped>

</style>