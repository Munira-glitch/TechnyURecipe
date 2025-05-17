<section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            What Our Users Are Saying
        </h2>
        <p class="mt-4 text-lg text-gray-600">
            Join thousands who’ve transformed their meals with TechnyURecipe!
        </p>

        <div x-data="{ activeSlide: 0 }" class="relative mt-10">
            @php
                $testimonials = [
                    [
                        'name' => 'Sarah A.',
                        'image' => 'https://randomuser.me/api/portraits/women/44.jpg',
                        'text' => 'I’ve tried over 20 recipes from this site. The step-by-step guides are so easy to follow. My family loves it!',
                    ],
                    [
                        'name' => 'Michael T.',
                        'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
                        'text' => 'TechnyURecipe has completely changed the way I cook. Every dish feels like a restaurant-quality meal!',
                    ],
                    [
                        'name' => 'Amina K.',
                        'image' => 'https://randomuser.me/api/portraits/women/65.jpg',
                        'text' => 'It’s like having a chef in your pocket. The ingredients are simple, and the meals are delicious!',
                    ],
                ];
            @endphp

            <div class="overflow-hidden relative h-60">
                <template x-for="(testimonial, index) in {{ json_encode($testimonials) }}" :key="index">
                    <div
                        x-show="activeSlide === index"
                        class="absolute inset-0 flex flex-col items-center justify-center text-center transition duration-700 ease-in-out"
                        x-transition
                    >
                        <img :src="testimonial.image" class="w-20 h-20 rounded-full object-cover mb-4 border-4 border-primary" />
                        <blockquote class="text-lg text-gray-700 italic px-4 max-w-xl">
                            <span x-text="testimonial.text"></span>
                        </blockquote>
                        <cite class="mt-4 text-sm font-semibold text-primary">
                            — <span x-text="testimonial.name"></span>
                        </cite>
                    </div>
                </template>
            </div>

            <!-- Controls -->
            <div class="mt-8 flex justify-center gap-3">
                <template x-for="(item, index) in {{ count($testimonials) }}">
                    <button
                        @click="activeSlide = index"
                        class="w-3 h-3 rounded-full"
                        :class="activeSlide === index ? 'bg-primary' : 'bg-gray-300'"
                    ></button>
                </template>
            </div>
        </div>
    </div>
</section>
