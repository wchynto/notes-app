<template>
    <AppLayout>
        <Breadcrumb :mainCategory="mainCategory" btnText="Buat baru" :btnUrl="route('lists.create')"></Breadcrumb>
        <div class="grid grid-cols-2 gap-4 mb-4 lg:grid-cols-3 xl:grid-cols-4">
            <List v-for="list in lists" :bgColor="list.color" :title="list.title" deleteUrl="1"
                :description="list.description" :listId="list.ulid" :updateUrl="route('lists.edit', list.ulid)">
                <ul>
                    <li v-for="todo in list.todos">
                        <Todo :bgColor="todoColor(list.color)" :listId="list.ulid" :todoId="todo.ulid">
                            {{ todo.title }}
                        </Todo>
                    </li>
                </ul>
            </List>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import List from '@/Components/List.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import Todo from '@/Components/Todo.vue';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    lists: {
        type: Array,
        required: true,
    },
});

const mainCategory = { title: props.title, url: route(route().current()) };

const todoColor = (colorClass) => {
    const parts = colorClass.split('-');
    const numericPart = parseInt(parts[2], 10) + 100;
    const newColorClass = `${parts[0]}-${parts[1]}-${numericPart}`;
    return newColorClass;
}
</script>
