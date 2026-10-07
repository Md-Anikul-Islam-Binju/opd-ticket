
{{-- =========================================================
     AI APPOINTMENT ASSISTANT
========================================================= --}}

<section class="mb-8">

    <div
        class="relative overflow-hidden rounded-2xl border border-teal-100
               bg-gradient-to-br from-white via-teal-50/40 to-cyan-50
               shadow-sm"
    >

        {{-- Background Decoration --}}
        <div class="absolute -right-16 -top-16 w-48 h-48 rounded-full bg-teal-500/10"></div>

        <div class="absolute -left-20 -bottom-20 w-56 h-56 rounded-full bg-cyan-500/10"></div>


        <div class="relative">

            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="px-6 py-5 border-b border-teal-100">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div class="flex items-center gap-4">

                        {{-- AI Icon --}}
                        <div
                            class="w-12 h-12 rounded-2xl
                                   bg-gradient-to-br from-teal-600 to-cyan-600
                                   text-white
                                   flex items-center justify-center
                                   shadow-md"
                        >
                            <i class="fa-solid fa-robot text-xl"></i>
                        </div>


                        <div>

                            <div class="flex items-center gap-2">

                                <h3 class="text-lg sm:text-xl font-bold text-slate-800">
                                    AI Appointment Assistant
                                </h3>

                                <span
                                    class="inline-flex items-center gap-1
                                           px-2 py-1 rounded-full
                                           bg-green-100 text-green-700
                                           text-[10px] font-bold"
                                >
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                    Online
                                </span>

                            </div>


                            <p class="text-sm text-slate-500 mt-1">
                                Book your OPD appointment using natural language.
                            </p>

                        </div>

                    </div>


                    {{-- AI Badge --}}
                    <div
                        class="hidden sm:flex items-center gap-2
                               px-3 py-2 rounded-xl
                               bg-white border border-slate-200
                               text-xs font-semibold text-slate-600"
                    >
                        <i class="fa-solid fa-wand-magic-sparkles text-teal-600"></i>
                        AI Powered
                    </div>

                </div>

            </div>


            {{-- =================================================
                 CHAT AREA
            ================================================== --}}

            <div class="p-6">


                {{-- =================================================
                     CHAT MESSAGES
                ================================================== --}}

                <div
                    id="aiChatMessages"
                    class="space-y-4 max-h-[500px] overflow-y-auto pr-1"
                >

                    {{-- Welcome Message --}}
                    <div class="flex items-start gap-3">

                        {{-- AI Avatar --}}
                        <div
                            class="flex-shrink-0
                                   w-9 h-9 rounded-xl
                                   bg-teal-600 text-white
                                   flex items-center justify-center"
                        >
                            <i class="fa-solid fa-robot text-sm"></i>
                        </div>


                        {{-- Message --}}
                        <div class="max-w-2xl">

                            <div
                                class="rounded-2xl rounded-tl-md
                                       bg-white
                                       border border-slate-200
                                       shadow-sm
                                       px-4 py-3"
                            >

                                <p class="text-sm text-slate-700 leading-relaxed">

                                    Hello, {{ $patient->user->name ?? 'Patient' }}! 👋

                                    <br>

                                    I can help you book an OPD appointment.

                                    <br>

                                    Just tell me what you need in your own words.

                                </p>

                            </div>


                            <p class="text-[11px] text-slate-400 mt-1 ml-1">
                                AI Appointment Assistant
                            </p>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     QUICK PROMPTS
                ================================================== --}}

                <div class="mt-5">

                    <p class="text-xs font-semibold text-slate-500 mb-3">
                        Try asking
                    </p>


                    <div class="flex flex-wrap gap-2">

                        <button
                            type="button"
                            onclick="setAiPrompt('I want to book an OPD appointment')"
                            class="ai-quick-prompt"
                        >
                            <i class="fa-solid fa-calendar-plus text-teal-600"></i>
                            Book an appointment
                        </button>


                        <button
                            type="button"
                            onclick="setAiPrompt('I need to see a doctor for fever')"
                            class="ai-quick-prompt"
                        >
                            <i class="fa-solid fa-temperature-half text-red-500"></i>
                            I have fever
                        </button>


                        <button
                            type="button"
                            onclick="setAiPrompt('Show me available doctors')"
                            class="ai-quick-prompt"
                        >
                            <i class="fa-solid fa-user-doctor text-blue-600"></i>
                            Available doctors
                        </button>


                        <button
                            type="button"
                            onclick="setAiPrompt('Show me available appointment slots')"
                            class="ai-quick-prompt"
                        >
                            <i class="fa-solid fa-clock text-amber-600"></i>
                            Available slots
                        </button>

                    </div>

                </div>


                {{-- =================================================
                     PROMPT FORM
                ================================================== --}}

                <form
                    id="aiAppointmentForm"
                    method="POST"
                    action="{{ route('patient.ai.appointment.prompt') }}"
                    class="mt-5"
                >

                    @csrf


                    <div
                        class="rounded-2xl
                               bg-white
                               border border-slate-200
                               shadow-sm
                               overflow-hidden"
                    >

                        <div class="p-3">

                            <div class="flex items-end gap-2">


                                {{-- Textarea --}}
                                <div class="flex-1">

                                    <label
                                        for="aiPrompt"
                                        class="sr-only"
                                    >
                                        Appointment request
                                    </label>


                                    <textarea
                                        id="aiPrompt"
                                        name="prompt"
                                        rows="2"
                                        maxlength="2000"
                                        required
                                        placeholder="Tell me what appointment you need..."
                                        class="w-full resize-none
                                               border-0
                                               focus:ring-0
                                               focus:outline-none
                                               text-sm
                                               text-slate-700
                                               placeholder-slate-400
                                               bg-transparent"
                                    ></textarea>

                                </div>


                                {{-- Send Button --}}
                                <button
                                    type="submit"
                                    id="aiSendButton"
                                    class="flex-shrink-0
                                           w-11 h-11
                                           rounded-xl
                                           bg-teal-600
                                           hover:bg-teal-700
                                           text-white
                                           flex items-center justify-center
                                           transition
                                           shadow-sm"
                                    title="Send"
                                >

                                    <i
                                        id="aiSendIcon"
                                        class="fa-solid fa-paper-plane"
                                    ></i>

                                </button>

                            </div>

                        </div>


                        {{-- Bottom Info --}}
                        <div
                            class="px-4 py-2.5
                                   bg-slate-50
                                   border-t border-slate-100
                                   flex flex-col sm:flex-row
                                   sm:items-center
                                   sm:justify-between
                                   gap-2"
                        >

                            <p class="text-[11px] text-slate-400">

                                <i class="fa-solid fa-circle-info mr-1"></i>

                                You can write naturally in English or Bangla.

                            </p>


                            <p
                                id="aiCharacterCount"
                                class="text-[11px] text-slate-400"
                            >
                                0 / 2000
                            </p>

                        </div>

                    </div>

                </form>


                {{-- =================================================
                     LOADING
                ================================================== --}}

                <div
                    id="aiLoading"
                    class="hidden mt-4"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="w-9 h-9 rounded-xl
                                   bg-teal-600 text-white
                                   flex items-center justify-center
                                   flex-shrink-0"
                        >
                            <i class="fa-solid fa-robot text-sm"></i>
                        </div>


                        <div
                            class="bg-white
                                   border border-slate-200
                                   rounded-2xl rounded-tl-md
                                   px-4 py-3
                                   shadow-sm"
                        >

                            <div class="flex items-center gap-2">

                                <span class="text-sm text-slate-500">
                                    AI is thinking
                                </span>


                                <span class="flex gap-1">

                                    <span
                                        class="w-1.5 h-1.5
                                               bg-teal-500
                                               rounded-full
                                               animate-bounce"
                                    ></span>

                                    <span
                                        class="w-1.5 h-1.5
                                               bg-teal-500
                                               rounded-full
                                               animate-bounce"
                                        style="animation-delay: 0.15s"
                                    ></span>

                                    <span
                                        class="w-1.5 h-1.5
                                               bg-teal-500
                                               rounded-full
                                               animate-bounce"
                                        style="animation-delay: 0.3s"
                                    ></span>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     SECURITY / INFO
                ================================================== --}}

                <div class="mt-5 flex items-start gap-2">

                    <i
                        class="fa-solid fa-shield-halved
                               text-teal-600 text-xs mt-0.5"
                    ></i>

                    <p class="text-[11px] text-slate-400 leading-relaxed">

                        Your appointment will only be created after you confirm
                        the selected doctor, date and available time slot.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     STYLES
========================================================= --}}

<style>

    .ai-quick-prompt {

        display: inline-flex;

        align-items: center;

        gap: 0.5rem;

        padding: 0.6rem 0.8rem;

        border-radius: 0.75rem;

        background: white;

        border: 1px solid #e2e8f0;

        color: #475569;

        font-size: 0.75rem;

        font-weight: 600;

        transition: all 0.2s ease;

        cursor: pointer;
    }


    .ai-quick-prompt:hover {

        border-color: #99f6e4;

        background: #f0fdfa;

        color: #0f766e;

        transform: translateY(-1px);
    }


    .ai-quick-prompt:active {

        transform: translateY(0);
    }


    #aiPrompt {

        min-height: 52px;

        max-height: 140px;
    }


    #aiPrompt::-webkit-scrollbar {

        width: 5px;
    }


    #aiPrompt::-webkit-scrollbar-track {

        background: transparent;
    }


    #aiPrompt::-webkit-scrollbar-thumb {

        background: #cbd5e1;

        border-radius: 10px;
    }


    #aiChatMessages::-webkit-scrollbar {

        width: 5px;
    }


    #aiChatMessages::-webkit-scrollbar-track {

        background: transparent;
    }


    #aiChatMessages::-webkit-scrollbar-thumb {

        background: #cbd5e1;

        border-radius: 10px;
    }

</style>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const form =
            document.getElementById('aiAppointmentForm');

        const prompt =
            document.getElementById('aiPrompt');

        const sendButton =
            document.getElementById('aiSendButton');

        const sendIcon =
            document.getElementById('aiSendIcon');

        const loading =
            document.getElementById('aiLoading');

        const chatMessages =
            document.getElementById('aiChatMessages');

        const characterCount =
            document.getElementById('aiCharacterCount');


        /*
        |--------------------------------------------------------------------------
        | Character Counter
        |--------------------------------------------------------------------------
        */

        if (prompt && characterCount) {

            prompt.addEventListener('input', function () {

                characterCount.textContent =
                    this.value.length + ' / 2000';

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Enter = Submit
        |--------------------------------------------------------------------------
        |
        | Shift + Enter = New Line
        |
        */

        if (prompt) {

            prompt.addEventListener('keydown', function (event) {

                if (
                    event.key === 'Enter' &&
                    !event.shiftKey
                ) {

                    event.preventDefault();

                    form.requestSubmit();

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Add User Message
        |--------------------------------------------------------------------------
        */

        function addUserMessage(message) {

            const wrapper =
                document.createElement('div');

            wrapper.className =
                'flex items-start gap-3 justify-end';


            wrapper.innerHTML = `

                <div class="max-w-2xl">

                    <div
                        class="rounded-2xl rounded-tr-md
                               bg-teal-600
                               text-white
                               px-4 py-3
                               shadow-sm"
                    >

                        <p class="text-sm leading-relaxed whitespace-pre-wrap">
                            ${escapeHtml(message)}
                        </p>

                    </div>

                    <p class="text-[11px] text-slate-400 mt-1 text-right mr-1">
                        You
                    </p>

                </div>

            `;


            chatMessages.appendChild(wrapper);

            scrollChat();

        }


        /*
        |--------------------------------------------------------------------------
        | Add AI Message
        |--------------------------------------------------------------------------
        */

        function addAiMessage(message) {

            const wrapper =
                document.createElement('div');

            wrapper.className =
                'flex items-start gap-3';


            wrapper.innerHTML = `

                <div
                    class="flex-shrink-0
                           w-9 h-9 rounded-xl
                           bg-teal-600 text-white
                           flex items-center justify-center"
                >

                    <i class="fa-solid fa-robot text-sm"></i>

                </div>


                <div class="max-w-3xl">

                    <div
                        class="rounded-2xl rounded-tl-md
                               bg-white
                               border border-slate-200
                               shadow-sm
                               px-4 py-4
                               text-sm text-slate-700
                               leading-relaxed"
                    >

                        <div class="whitespace-pre-wrap">
                            ${escapeHtml(message)}
                        </div>

                    </div>


                    <p class="text-[11px] text-slate-400 mt-1 ml-1">
                        AI Appointment Assistant
                    </p>

                </div>

            `;


            chatMessages.appendChild(wrapper);

            scrollChat();

        }


        /*
        |--------------------------------------------------------------------------
        | Add Error Message
        |--------------------------------------------------------------------------
        */

        function addErrorMessage(message) {

            const wrapper =
                document.createElement('div');

            wrapper.className =
                'flex items-start gap-3';


            wrapper.innerHTML = `

                <div
                    class="flex-shrink-0
                           w-9 h-9 rounded-xl
                           bg-red-100 text-red-600
                           flex items-center justify-center"
                >

                    <i class="fa-solid fa-circle-exclamation text-sm"></i>

                </div>


                <div class="max-w-3xl">

                    <div
                        class="rounded-2xl rounded-tl-md
                               bg-red-50
                               border border-red-200
                               px-4 py-4
                               text-sm text-red-600"
                    >

                        ${escapeHtml(message)}

                    </div>

                </div>

            `;


            chatMessages.appendChild(wrapper);

            scrollChat();

        }


        /*
        |--------------------------------------------------------------------------
        | Scroll Chat To Bottom
        |--------------------------------------------------------------------------
        */

        function scrollChat() {

            setTimeout(function () {

                chatMessages.scrollTo({

                    top: chatMessages.scrollHeight,

                    behavior: 'smooth'

                });

            }, 100);

        }


        /*
        |--------------------------------------------------------------------------
        | Escape HTML
        |--------------------------------------------------------------------------
        */

        function escapeHtml(text) {

            const div =
                document.createElement('div');

            div.textContent = text;

            return div.innerHTML;

        }


        /*
        |--------------------------------------------------------------------------
        | AJAX Submit
        |--------------------------------------------------------------------------
        */

        if (form) {

            form.addEventListener('submit', async function (event) {

                event.preventDefault();


                /*
                |--------------------------------------------------------------------------
                | Get Prompt Value
                |--------------------------------------------------------------------------
                */

                const promptValue =
                    prompt.value.trim();


                /*
                |--------------------------------------------------------------------------
                | Empty Prompt Check
                |--------------------------------------------------------------------------
                */

                if (!promptValue) {

                    prompt.focus();

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | IMPORTANT:
                | Create FormData BEFORE Clearing Textarea
                |--------------------------------------------------------------------------
                */

                const formData =
                    new FormData(form);


                /*
                |--------------------------------------------------------------------------
                | Show User Message
                |--------------------------------------------------------------------------
                */

                addUserMessage(promptValue);


                /*
                |--------------------------------------------------------------------------
                | Clear Input
                |--------------------------------------------------------------------------
                */

                prompt.value = '';

                characterCount.textContent =
                    '0 / 2000';


                /*
                |--------------------------------------------------------------------------
                | Loading State
                |--------------------------------------------------------------------------
                */

                sendButton.disabled = true;

                sendButton.classList.add(
                    'opacity-60',
                    'cursor-not-allowed'
                );

                sendIcon.className =
                    'fa-solid fa-spinner fa-spin';


                loading.classList.remove('hidden');

                scrollChat();


                /*
                |--------------------------------------------------------------------------
                | Send Request
                |--------------------------------------------------------------------------
                */

                try {

                    const responseData =
                        await fetch(
                            form.action,
                            {
                                method: 'POST',

                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                },

                                body: formData
                            }
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | Parse JSON Response
                    |--------------------------------------------------------------------------
                    */

                    const data =
                        await responseData.json();


                    /*
                    |--------------------------------------------------------------------------
                    | Hide Loading
                    |--------------------------------------------------------------------------
                    */

                    loading.classList.add('hidden');


                    /*
                    |--------------------------------------------------------------------------
                    | Handle HTTP Error
                    |--------------------------------------------------------------------------
                    */

                    if (!responseData.ok) {

                        throw new Error(
                            data.message ||
                            'Something went wrong. Please try again.'
                        );

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Add AI Response
                    |--------------------------------------------------------------------------
                    */

                    addAiMessage(
                        data.message ||
                        data.response ||
                        'I received your request.'
                    );

                }


                catch (error) {

                    /*
                    |--------------------------------------------------------------------------
                    | Hide Loading
                    |--------------------------------------------------------------------------
                    */

                    loading.classList.add('hidden');


                    /*
                    |--------------------------------------------------------------------------
                    | Show Error
                    |--------------------------------------------------------------------------
                    */

                    addErrorMessage(
                        error.message ||
                        'Something went wrong. Please try again.'
                    );

                }


                finally {

                    /*
                    |--------------------------------------------------------------------------
                    | Reset Send Button
                    |--------------------------------------------------------------------------
                    */

                    sendButton.disabled = false;

                    sendButton.classList.remove(
                        'opacity-60',
                        'cursor-not-allowed'
                    );

                    sendIcon.className =
                        'fa-solid fa-paper-plane';


                    /*
                    |--------------------------------------------------------------------------
                    | Focus Input
                    |--------------------------------------------------------------------------
                    */

                    prompt.focus();

                }

            });

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Quick Prompt
    |--------------------------------------------------------------------------
    */

    function setAiPrompt(value) {

        const prompt =
            document.getElementById('aiPrompt');

        const characterCount =
            document.getElementById('aiCharacterCount');


        if (!prompt) {

            return;

        }


        prompt.value = value;


        if (characterCount) {

            characterCount.textContent =
                value.length + ' / 2000';

        }


        prompt.focus();

    }

</script>

