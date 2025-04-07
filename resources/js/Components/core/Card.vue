<script setup lang="ts">

    // Import types
    import type { CardType } from '@/types/core/CardType';

    // Define props
    defineProps<CardType>();

</script>

<template>
    <div class="card">
        <div class="flex justify-between pb-4">
            <h2 class="card-heading h-full">{{ heading }}</h2>

            <!-- Conditionally render icon if provided -->
            <div v-if="icon" class="flex justify-center items-center">
                <a v-if="href" :href="href">
          <span class="text-3xl text-rose-600 material-symbols-outlined">
            {{ icon }}
          </span>
                </a>
                <span v-else class="text-3xl text-rose-600 material-symbols-outlined">
          {{ icon }}
        </span>
            </div>
        </div>

        <!-- Body content -->
        <div>
            <slot />
        </div>
    </div>
</template>

<style scoped lang="postcss">
    .card {
        @apply bg-white shadow-lg rounded-md p-8 max-w-lg;
    }

    .card-heading {
        @apply font-atodo font-bold text-rose-600 text-3xl mb-4;
    }
</style>

