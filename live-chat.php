<style>
/* Scoped styles for the chat widget */
#morweb-chat-widget {
    --chat-primary: #2563eb;
    --chat-primary-hover: #1d4ed8;
    --chat-secondary: #f8fafc;
    --chat-text: #1e293b;
    --chat-text-light: #64748b;
    --chat-border: #e2e8f0;
    --chat-user-bg: #2563eb;
    --chat-bot-bg: #ffffff;
    --chat-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --chat-shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    position: fixed;
    bottom: 0;
    right: 0;
    z-index: 9999;
}

#morweb-chat-widget * {
    box-sizing: border-box;
}

/* Chat toggle button */
.chat-toggle {
    position: fixed;
    bottom: 124px;
    right: 24px;
    width: 60px;
    height: 60px;
    background: var(--chat-primary);
    border: none;
    border-radius: 50%;
    box-shadow: var(--chat-shadow-lg);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 10001;
}

.chat-toggle:hover {
    background: var(--chat-primary-hover);
    transform: scale(1.05);
}

.chat-toggle:focus {
    outline: 2px solid var(--chat-primary);
    outline-offset: 2px;
}

.chat-toggle svg {
    width: 24px;
    height: 24px;
    fill: white;
    transition: transform 0.3s ease;
}

.chat-toggle.active .chat-icon {
    transform: scale(0);
}

.chat-toggle.active .close-icon {
    transform: scale(1);
}

.close-icon {
    transform: scale(0);
    position: absolute;
}

/* Chat panel */
.chat-panel {
    position: fixed;
    top: 0;
    right: -400px;
    width: 400px;
    height: 100vh;
    background: var(--chat-secondary);
    border-left: 1px solid var(--chat-border);
    box-shadow: var(--chat-shadow-lg);
    transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    z-index: 10000;
}

.chat-panel.open {
    right: 0;
}

/* Chat header */
.chat-header {
    background: white;
    padding: 20px 24px;
    border-bottom: 1px solid var(--chat-border);
    display: flex;
    align-items: center;
    gap: 12px;
}

.chat-header .avatar {
    width: 40px;
    height: 40px;
    background: var(--chat-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 16px;
}

.chat-header .info h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
    color: var(--chat-text);
}

.chat-header .info p {
    margin: 2px 0 0 0;
    font-size: 13px;
    color: var(--chat-text-light);
}

/* Chat messages */
.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    scroll-behavior: smooth;
    background: var(--chat-secondary);
}

.message {
    margin-bottom: 16px;
    display: flex;
    flex-direction: column;
}

.message.user {
    align-items: flex-end;
}

.message.bot {
    align-items: flex-start;
}

.message-bubble {
    max-width: 85%;
    padding: 12px 16px;
    border-radius: 18px;
    font-size: 14px;
    line-height: 1.4;
    word-wrap: break-word;
}

.message.user .message-bubble {
    background: var(--chat-user-bg);
    color: white;
    border-bottom-right-radius: 4px;
}

.message.bot .message-bubble {
    background: var(--chat-bot-bg);
    color: var(--chat-text);
    border: 1px solid var(--chat-border);
    border-bottom-left-radius: 4px;
}

.message.bot.intro .message-bubble {
    background: linear-gradient(135deg, #dbeafe 0%, #eff6ff 100%);
    border-color: #93c5fd;
}

/* Typing indicator */
.typing-indicator {
    display: flex;
    gap: 4px;
    padding: 12px 16px;

}

.typing-dot {
    width: 8px;
    height: 8px;
    background: var(--chat-text-light);
    border-radius: 50%;
    animation: typing 1.4s infinite ease-in-out;
}

.typing-dot:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-dot:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
        opacity: 0.4;
    }
    30% {
        transform: translateY(-10px);
        opacity: 1;
    }
}

/* Result items */
.result-item {
    background: white;
    border: 1px solid var(--chat-border);
    border-radius: 8px;
    padding: 12px;
    margin: 8px 0;
    transition: all 0.2s ease;
    cursor: pointer;
    position: relative;
}

.result-item:hover {
    border-color: var(--chat-primary);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
    transform: translateY(-1px);
}

.result-item:focus {
    outline: 2px solid var(--chat-primary);
    outline-offset: 1px;
}

.result-title {
    font-weight: 600;
    color: var(--chat-text);
    margin-bottom: 4px;
    font-size: 14px;
    line-height: 1.3;
}

.result-url {
    color: var(--chat-primary);
    font-size: 12px;
    word-break: break-all;
    opacity: 0.8;
}

.result-item:hover .result-url {
    opacity: 1;
}

/* Status indicators */
.status-message {
    text-align: center;
    padding: 12px;
    font-size: 12px;
    color: var(--chat-text-light);
    background: rgba(59, 130, 246, 0.05);
    border-radius: 8px;
    margin: 8px 0;
    transition: all 0.3s ease;
}

.status-message.success {
    background: rgba(34, 197, 94, 0.1);
    color: #16a34a;
}

.status-message.error {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
}

.status-message.empty {
    background: rgba(100, 116, 139, 0.05);
    color: var(--chat-text-light);
}

/* Chat input */
.chat-input {
    background: white;
    border-top: 1px solid var(--chat-border);
    padding: 20px;
}

.input-container {
    display: flex;
    gap: 8px;
    align-items: flex-end;
}

.chat-input input {
    flex: 1;
    border: 1px solid var(--chat-border);
    border-radius: 20px;
    padding: 12px 16px;
    font-size: 14px;
    outline: none;
    background: var(--chat-secondary);
    color: var(--chat-text);
    transition: border-color 0.2s ease;
}

.chat-input input:focus {
    border-color: var(--chat-primary);
    background: white;
}

.chat-input input::placeholder {
    color: var(--chat-text-light);
}

.send-button {
    width: 40px;
    height: 40px;
    background: var(--chat-primary);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.send-button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.send-button:hover:not(:disabled) {
    background: var(--chat-primary-hover);
    transform: scale(1.05);
}

.send-button:focus {
    outline: 2px solid var(--chat-primary);
    outline-offset: 2px;
}

.send-button svg {
    width: 16px;
    height: 16px;
    fill: white;
}

/* Quick suggestions */
.quick-suggestions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 16px 0;
}

.suggestion-chip {
    background: white;
    border: 1px solid var(--chat-border);
    border-radius: 16px;
    padding: 6px 12px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    color: var(--chat-text);
}

.suggestion-chip:hover {
    border-color: var(--chat-primary);
    background: var(--chat-primary);
    color: white;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .chat-panel {
        width: 100vw;
        right: -100vw;
    }
    
    .chat-toggle {
        bottom: 120px;
        right: 20px;
        width: 56px;
        height: 56px;
    }
}

/* Backdrop */
.chat-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 9999;
}

.chat-backdrop.visible {
    opacity: 1;
    visibility: visible;
}

@media (min-width: 769px) {
    .chat-backdrop {
        display: none;
    }
}

/* Loading shimmer */
.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}
</style>

<!-- Chat Widget Container -->
<div id="morweb-chat-widget">
    <!-- Backdrop for mobile -->
    <div class="chat-backdrop"></div>
    
    <!-- Toggle Button -->
    <button class="chat-toggle" aria-label="Open support chat">
        <svg class="chat-icon" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M20 2H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h4l4 4 4-4h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM8.5 13.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
        </svg>
        <svg class="close-icon" viewBox="0 0 24 24" stroke="#ffffff" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M18 6L6 18M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Chat Panel -->
    <div class="chat-panel" role="dialog" aria-labelledby="chat-title" aria-describedby="chat-description">
        <!-- Header -->
        <div class="chat-header">
            <div class="avatar" aria-hidden="true">MS</div>
            <div class="info">
                <h3 id="chat-title">Morweb Support</h3>
                <p id="chat-description">Usually replies instantly</p>
            </div>
        </div>

        <!-- Messages -->
        <div class="chat-messages" role="log" aria-live="polite" aria-label="Chat messages">
            <div class="message bot intro">
                <div class="message-bubble">
                    Hi! I'm here to help you find Morweb support articles. Ask me anything about Morweb CMS, troubleshooting, features, or setup questions!
                </div>
            </div>
            <div class="quick-suggestions">
                <button class="suggestion-chip" data-suggestion="How to add a new page">Add new page</button>
                <button class="suggestion-chip" data-suggestion="How to edit banner text">Edit banner</button>
                <button class="suggestion-chip" data-suggestion="How to manage users">User management</button>
                <button class="suggestion-chip" data-suggestion="How to add images">Add images</button>
                <button class="suggestion-chip" data-suggestion="How to create blog posts">Create blog post</button>
                <button class="suggestion-chip" data-suggestion="How to connect Google Analytics">Google Analytics</button>
                <button class="suggestion-chip" data-suggestion="How to optimize for SEO">SEO optimization</button>
            </div>
            <div class="status-message">Loading support articles...</div>
        </div>

        <!-- Input -->
        <div class="chat-input">
            <form class="input-container" autocomplete="off">
                <input type="text" placeholder="Ask about Morweb features, setup, troubleshooting..." maxlength="500" aria-label="Type your question">
                <button type="submit" class="send-button" aria-label="Send message">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M2 21l21-9L2 3v7l15 2-15 2v7z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Optimized Morweb Support Chat Widget
class MorwebSupportChat {
    constructor() {
        this.widget = document.getElementById('morweb-chat-widget');
        this.isOpen = false;
        this.isLoaded = false;
        this.awaitingFeedback = false;
        this.feedbackAttempts = 0;
        this.lastSearchResults = [];
        this.supportArticles = [];
        
        // Enhanced search configuration
        this.searchConfig = {
            minQueryLength: 2,
            maxResults: 3,
            fuzzyThreshold: 0.6,
            stopWords: new Set([
                'the', 'a', 'an', 'to', 'of', 'and', 'for', 'in', 'on', 'at', 'with',
                'how', 'what', 'where', 'when', 'why', 'which', 'who', 'can', 'could',
                'would', 'should', 'will', 'do', 'does', 'did', 'have', 'has', 'had',
                'is', 'are', 'was', 'were', 'be', 'been', 'being', 'this', 'that',
                'these', 'those', 'i', 'you', 'he', 'she', 'it', 'we', 'they', 'me',
                'him', 'her', 'us', 'them', 'my', 'your', 'his', 'her', 'its', 'our',
                'their', 'help', 'support', 'article', 'page', 'find'
            ])
        };
        
        // Conversation patterns
        this.conversationPatterns = {
            greetings: [
                /^(hi|hello|hey|howdy|sup|what's up|whats up)\b/i,
                /how (are you|r u|are ya)\b/i,
                /(good morning|good afternoon|good evening)\b/i
            ],
            gratitude: [
                /\b(thank you|thanks|thx|appreciate)\b/i,
                /you('re| are) (great|awesome|helpful|amazing)/i
            ],
            farewells: [
                /\b(bye|goodbye|see you|talk to you later|ttyl)\b/i,
                /(have a good|have a great) (day|weekend|time)/i
            ]
        };
        
        this.responses = {
            greetings: [
                "Hi there! I'm here to help you find Morweb support articles. What can I assist you with?",
                "Hello! Ready to help you solve any Morweb questions you have!",
                "Hey! I'm your Morweb support assistant. How can I help you today?"
            ],
            gratitude: [
                "You're very welcome! Happy to help with any other Morweb questions.",
                "Glad I could help! Feel free to ask about anything else.",
                "You're welcome! I'm here whenever you need Morweb support."
            ],
            farewells: [
                "Goodbye! Come back anytime you need Morweb help. Have a great day!",
                "See you later! I'll be here when you need support. Take care!",
                "Have a wonderful day! Feel free to return with any questions."
            ]
        };
        
        this.init();
    }
    
    init() {
        this.cacheElements();
        this.bindEvents();
        this.loadSupportData();
    }
    
    cacheElements() {
        this.elements = {
            toggle: this.widget.querySelector('.chat-toggle'),
            panel: this.widget.querySelector('.chat-panel'),
            backdrop: this.widget.querySelector('.chat-backdrop'),
            messages: this.widget.querySelector('.chat-messages'),
            input: this.widget.querySelector('.chat-input input'),
            sendButton: this.widget.querySelector('.send-button'),
            form: this.widget.querySelector('.input-container'),
            statusMessage: this.widget.querySelector('.status-message'),
            suggestions: this.widget.querySelectorAll('.suggestion-chip')
        };
    }
    
    bindEvents() {
        // Toggle chat
        this.elements.toggle.addEventListener('click', () => this.toggleChat());
        this.elements.backdrop.addEventListener('click', () => this.toggleChat());
        
        // Form submission
        this.elements.form.addEventListener('submit', (e) => this.handleSubmit(e));
        
        // Quick suggestions
        this.elements.suggestions.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const suggestion = e.target.dataset.suggestion;
                this.elements.input.value = suggestion;
                this.handleSubmit(new Event('submit'));
            });
        });
        
        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isOpen) {
                this.toggleChat();
            }
        });
        
        // Auto-resize input
        this.elements.input.addEventListener('input', () => this.adjustInputHeight());
    }
    
    toggleChat() {
        this.isOpen = !this.isOpen;
        this.elements.toggle.classList.toggle('active', this.isOpen);
        this.elements.panel.classList.toggle('open', this.isOpen);
        this.elements.backdrop.classList.toggle('visible', this.isOpen);
        
        if (this.isOpen) {
            this.elements.input.focus();
            this.trackEvent('chat_opened');
        } else {
            this.trackEvent('chat_closed');
        }
    }
    
    adjustInputHeight() {
        const input = this.elements.input;
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 120) + 'px';
    }
    
    loadSupportData() {
        this.updateStatus('Loading support articles...', 'loading');
        
        // Real Morweb support articles with verified working URLs
        const mockData = [
    {
        title: "How To Restrict User Access To Private Pages",
        url: "https://support.morwebcms.com/post/How-to-Restrict-User-Access-to-Private-Pages",
        keywords: ["restrict", "limit", "user", "access", "private", "pages", "permissions", "secure", "roles"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 95
    },
    {
        title: "How To Edit Banner Text In Morweb CMS",
        url: "https://support.morwebcms.com/post/How-to-Edit-Banner-Text-in-Morweb-CMS",
        keywords: ["edit", "banner", "text", "hero", "heading", "title", "update", "design", "style"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 88
    },
    {
        title: "How To Connect Google Analytics To Your Morweb Site",
        url: "https://support.morwebcms.com/post/How-to-Connect-Google-Analytics-to-Your-Morweb-Site",
        keywords: ["connect", "google", "analytics", "ga4", "tracking", "stats", "dashboard", "setup", "integrate"],
        category: "Integrations",
        difficulty: "intermediate",
        popularity: 92
    },
    {
        title: "How To Connect Your Google API Key To Morweb",
        url: "https://support.morwebcms.com/post/How-to-Connect-Your-Google-API-Key-to-Morweb",
        keywords: ["connect", "google", "api", "key", "integration", "credentials", "setup", "auth", "link"],
        category: "Integrations",
        difficulty: "advanced",
        popularity: 74
    },
    {
        title: "How To Add reCAPTCHA To A Form In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Add-reCAPTCHA-to-a-Form-in-Morweb",
        keywords: ["add", "recaptcha", "captcha", "spam", "bot", "form", "security", "protect", "verify"],
        category: "Forms & Security",
        difficulty: "intermediate",
        popularity: 78
    },
    {
        title: "How To Add A New Page",
        url: "https://support.morwebcms.com/post/How-to-add-a-new-page",
        keywords: ["add", "create", "new", "page", "content", "builder", "editor", "setup", "publish"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 97
    },
    {
        title: "How To Duplicate A Page",
        url: "https://support.morwebcms.com/post/How-to-Duplicate-a-Page",
        keywords: ["duplicate", "copy", "clone", "page", "template", "reuse", "replicate", "layout", "quick"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 85
    },
    {
        title: "How To Publish Unpublish A Page",
        url: "https://support.morwebcms.com/post/How-to-Publish-Unpublish-a-Page",
        keywords: ["publish", "unpublish", "show", "hide", "page", "live", "draft", "visibility", "toggle"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 91
    },
    {
        title: "How To Add Meta Titles And Meta Descriptions",
        url: "https://support.morwebcms.com/post/How-to-Add-Meta-Titles-and-Meta-Descriptions",
        keywords: ["add", "meta", "titles", "descriptions", "seo", "tags", "metadata", "search", "optimize"],
        category: "SEO & Analytics",
        difficulty: "intermediate",
        popularity: 89
    },
    {
        title: "How To Edit Page URLs In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Edit-Page-URLs-in-Morweb",
        keywords: ["edit", "page", "urls", "slug", "permalink", "path", "seo", "rename", "link"],
        category: "SEO & Analytics",
        difficulty: "intermediate",
        popularity: 82
    },
    {
        title: "How To Restrict User Access To Private Pages In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Restrict-User-Access-to-Private-Pages-in-Morweb",
        keywords: ["restrict", "user", "access", "private", "pages", "permission", "roles", "secure", "limit"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 93
    },

    {
        title: "How To Set Up Canonical Tags In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Set-Up-Canonical-Tags-in-Morweb",
        keywords: ["canonical", "tags", "duplicate", "seo", "rel", "preferred", "url", "setup", "search"],
        category: "SEO & Analytics",
        difficulty: "advanced",
        popularity: 71
    },
    {
        title: "How To Log In To Your Morweb CMS Site",
        url: "https://support.morwebcms.com/post/How-to-Log-In-to-Your-Morweb-CMS-Site",
        keywords: ["log", "login", "sign", "in", "access", "account", "auth", "credentials", "portal"],
        category: "User Management",
        difficulty: "beginner",
        popularity: 96
    },
    {
        title: "How To Disable Or Enable Page Indexing",
        url: "https://support.morwebcms.com/post/How-to-Disable-or-Enable-Page-Indexing",
        keywords: ["disable", "enable", "page", "indexing", "robots", "seo", "noindex", "search", "toggle"],
        category: "SEO & Analytics",
        difficulty: "intermediate",
        popularity: 76
    },
    {
        title: "How To Understand Pages Vs Posts What's The Difference",
        url: "https://support.morwebcms.com/post/How-to-Understand-Pages-vs-Posts-What-s-the-Difference",
        keywords: ["pages", "posts", "difference", "blog", "static", "content", "comparison", "structure", "types"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 84
    },
    {
        title: "How To Formatting Text Bold Italics Underline And More",
        url: "https://support.morwebcms.com/post/How-to-Formatting-Text-Bold-Italics-Underline-and-More",
        keywords: ["format", "text", "bold", "italic", "underline", "rich", "editor", "style", "typography"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 90
    },
    {
        title: "How To Add Text",
        url: "https://support.morwebcms.com/post/How-to-Add-Text",
        keywords: ["add", "insert", "text", "content", "paragraph", "editor", "write", "type", "block"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 94
    },
    {
        title: "How To Optimize Images For Faster Load Times",
        url: "https://support.morwebcms.com/post/How-to-Optimize-Images-for-Faster-Load-Times",
        keywords: ["optimize", "compress", "image", "speed", "load", "performance", "webp", "resize", "photos"],
        category: "Media Management",
        difficulty: "intermediate",
        popularity: 87
    },
    {
        title: "How To Use Headings H1 H2 H3 In Your Morweb Site",
        url: "https://support.morwebcms.com/post/How-to-Use-Headings-H1-H2-H3-in-Your-Morweb-Site",
        keywords: ["headings", "h1", "h2", "h3", "structure", "seo", "outline", "title", "semantic"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 89
    },
    {
        title: "How To Change Heading Styles And Sizes",
        url: "https://support.morwebcms.com/post/How-to-Change-Heading-Styles-and-Sizes",
        keywords: ["change", "heading", "style", "size", "font", "typography", "design", "css", "update"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 81
    },
    {
        title: "How To Create A Page Draft",
        url: "https://support.morwebcms.com/post/How-to-Create-a-Page-Draft",
        keywords: ["create", "draft", "page", "save", "unpublished", "version", "edit", "work", "progress"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 86
    },
    {
        title: "How To Add Multiple Buttons In One Row",
        url: "https://support.morwebcms.com/post/How-to-add-multiple-buttons-in-one-row",
        keywords: ["buttons", "multiple", "row", "cta", "layout", "inline", "design", "actions", "style"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 79
    },
    {
        title: "How To Copy And Paste Text Without Formatting Issues",
        url: "https://support.morwebcms.com/post/How-to-Copy-and-Paste-Text-Without-Formatting-Issues",
        keywords: ["copy", "paste", "text", "plain", "formatting", "cleanup", "clipboard", "editor", "sanitize"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 83
    },
    {
        title: "How To Allow Managing Credit Card Information Securely Through Morweb CMS",
        url: "https://support.morwebcms.com/post/How-to-Allow-Managing-Credit-Card-Information-Securely-through-Morweb-CMS",
        keywords: ["credit", "card", "payment", "pci", "secure", "manage", "billing", "finance", "tokenize"],
        category: "Forms & Security",
        difficulty: "advanced",
        popularity: 72
    },
    {
        title: "How To Add A Link To Text",
        url: "https://support.morwebcms.com/post/How-to-Add-a-Link-to-Text",
        keywords: ["add", "link", "hyperlink", "anchor", "text", "url", "insert", "connect", "href"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 95
    },
    {
        title: "How To Create Image Links To Other Pages Or Websites",
        url: "https://support.morwebcms.com/post/How-to-create-image-links-to-other-pages-or-websites",
        keywords: ["image", "link", "picture", "clickable", "href", "external", "pages", "navigation", "graphics"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 88
    },
    {
        title: "How To Add A Button",
        url: "https://support.morwebcms.com/post/How-to-add-a-button",
        keywords: ["add", "button", "cta", "click", "action", "link", "design", "style", "element"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 92
    },
    {
        title: "How To Customize Button Colors Styles And Sizes",
        url: "https://support.morwebcms.com/post/How-to-customize-button-colors-styles-and-sizes",
        keywords: ["customize", "button", "color", "style", "size", "css", "design", "ui", "theme"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 84
    },
    {
        title: "How To Reset Your Password In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Reset-Your-Password-in-Morweb",
        keywords: ["reset", "password", "forgot", "recover", "account", "security", "login", "credentials", "change"],
        category: "User Management",
        difficulty: "beginner",
        popularity: 87
    },
    {
        title: "How To Use Lists And Blockquotes For Better Readability",
        url: "https://support.morwebcms.com/post/How-to-Use-Lists-and-Blockquotes-for-Better-Readability",
        keywords: ["lists", "bullets", "ordered", "unordered", "blockquotes", "quotes", "readability", "format", "typography"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 85
    },
    {
        title: "How To Add An Anchor Link To Text",
        url: "https://support.morwebcms.com/post/How-to-Add-an-Anchor-Link-to-Text",
        keywords: ["anchor", "link", "jump", "section", "id", "text", "navigation", "internal", "bookmark"],
        category: "Navigation & Structure",
        difficulty: "intermediate",
        popularity: 78
    },
    {
        title: "How To Add An Image To Your Page",
        url: "https://support.morwebcms.com/post/How-to-Add-an-Image-to-Your-Page",
        keywords: ["add", "image", "upload", "picture", "media", "page", "insert", "graphic", "photo"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 96
    },
    {
        title: "How Can I Swap An Image On A Page",
        url: "https://support.morwebcms.com/post/How-Can-I-Swap-an-Image-on-a-Page",
        keywords: ["swap", "replace", "image", "picture", "update", "page", "media", "photo", "change"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 89
    },
    {
        title: "How Do I Resize And Crop Images",
        url: "https://support.morwebcms.com/post/How-Do-I-Resize-and-Crop-Images",
        keywords: ["resize", "crop", "images", "dimensions", "scale", "edit", "photo", "media", "optimize"],
        category: "Media Management",
        difficulty: "intermediate",
        popularity: 91
    },
    {
        title: "How To Upload An Image In A Gallery",
        url: "https://support.morwebcms.com/post/How-to-upload-an-image-in-a-gallery",
        keywords: ["upload", "image", "gallery", "media", "photos", "collection", "pictures", "add", "file"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 88
    },
    {
        title: "How To Update Text For Slider Images Or Galleries",
        url: "https://support.morwebcms.com/post/How-to-update-text-for-slider-images-or-galleries",
        keywords: ["update", "text", "slider", "carousel", "gallery", "caption", "image", "edit", "content"],
        category: "Media Management",
        difficulty: "intermediate",
        popularity: 82
    },
    {
        title: "How To Add A Spacer To A Page In The Page Editor",
        url: "https://support.morwebcms.com/post/How-to-Add-a-Spacer-to-a-Page-in-the-Page-Editor",
        keywords: ["spacer", "space", "padding", "margin", "layout", "page", "builder", "design", "gap"],
        category: "Design & Layout",
        difficulty: "beginner",
        popularity: 84
    },
    {
        title: "How To Add Or Edit Blog Post Categories In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Add-or-Edit-Blog-Post-Categories-in-Morweb",
        keywords: ["blog", "categories", "taxonomy", "edit", "add", "organize", "posts", "tags", "group"],
        category: "Blog Management",
        difficulty: "intermediate",
        popularity: 86
    },
    {
        title: "How To Change The Publish Date For A Blog Post",
        url: "https://support.morwebcms.com/post/How-to-Change-the-Publish-Date-for-a-Blog-Post",
        keywords: ["change", "publish", "date", "schedule", "blog", "post", "timing", "calendar", "update"],
        category: "Blog Management",
        difficulty: "beginner",
        popularity: 81
    },
    {
        title: "How To Use Accordions For FAQs And Expandable Content",
        url: "https://support.morwebcms.com/post/How-to-Use-Accordions-for-FAQs-and-Expandable-Content",
        keywords: ["accordion", "toggle", "faq", "expand", "collapse", "content", "ui", "panel", "section"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 83
    },
    {
        title: "Creating A Multi Column Layout With Subtemplates",
        url: "https://support.morwebcms.com/post/Creating-a-Multi-Column-Layout-with-Subtemplates",
        keywords: ["columns", "layout", "grid", "multi", "subtemplates", "design", "flex", "responsive", "structure"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 80
    },
    {
        title: "Adjusting Column Widths And Spacing",
        url: "https://support.morwebcms.com/post/Adjusting-Column-Widths-and-Spacing",
        keywords: ["column", "width", "spacing", "grid", "layout", "design", "responsive", "flex", "set"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 77
    },
    {
        title: "How To Add Image Alt Text",
        url: "https://support.morwebcms.com/post/How-to-Add-Image-Alt-Text",
        keywords: ["alt", "text", "image", "accessibility", "seo", "description", "tag", "aria", "caption"],
        category: "SEO & Analytics",
        difficulty: "beginner",
        popularity: 90
    },
    {
        title: "How To Create And Manage User Accounts",
        url: "https://support.morwebcms.com/post/How-to-Create-and-Manage-User-Accounts",
        keywords: ["user", "accounts", "create", "manage", "admin", "profile", "register", "edit", "members"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 85
    },
    {
        title: "Setting Up User Roles And Permissions",
        url: "https://support.morwebcms.com/post/Setting-Up-User-Roles-and-Permissions",
        keywords: ["roles", "permissions", "access", "levels", "security", "user", "admin", "manage", "auth"],
        category: "User Management",
        difficulty: "advanced",
        popularity: 79
    },
    {
        title: "How To Check A Users Edit History",
        url: "https://support.morwebcms.com/post/How-to-Check-a-Users-Edit-History",
        keywords: ["edit", "history", "audit", "track", "changes", "user", "log", "revisions", "review"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 75
    },
    {
        title: "How Do I Change My Password",
        url: "https://support.morwebcms.com/post/How-do-I-change-my-password",
        keywords: ["change", "password", "reset", "update", "security", "account", "credentials", "login", "edit"],
        category: "User Management",
        difficulty: "beginner",
        popularity: 93
    },
    {
        title: "How To Edit A Users Privileges",
        url: "https://support.morwebcms.com/post/How-to-Edit-a-Users-Privileges",
        keywords: ["edit", "privileges", "permissions", "roles", "user", "access", "admin", "rights", "manage"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 76
    },
    {
        title: "How Do I Set Up Accounts In Morweb",
        url: "https://support.morwebcms.com/post/How-do-I-set-up-accounts-in-Morweb",
        keywords: ["setup", "accounts", "user", "register", "create", "profile", "onboard", "admin", "manage"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 82
    },
    {
        title: "How To Create A Blog Post In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Create-a-Blog-Post-in-Morweb",
        keywords: ["create", "blog", "post", "article", "write", "publish", "editor", "content", "story"],
        category: "Blog Management",
        difficulty: "beginner",
        popularity: 94
    },
    {
        title: "Scheduling Blog Posts For Future Publication",
        url: "https://support.morwebcms.com/post/Scheduling-Blog-Posts-for-Future-Publication",
        keywords: ["schedule", "blog", "post", "publish", "future", "timer", "calendar", "auto", "date"],
        category: "Blog Management",
        difficulty: "intermediate",
        popularity: 84
    },
    {
        title: "Setting Up Automated Confirmation Emails For Forms",
        url: "https://support.morwebcms.com/post/Setting-Up-Automated-Confirmation-Emails-for-Forms",
        keywords: ["confirmation", "email", "auto", "form", "response", "notification", "reply", "setup", "mail"],
        category: "Forms & Security",
        difficulty: "intermediate",
        popularity: 81
    },
    {
        title: "How To Link Buttons To Pages And External Links",
        url: "https://support.morwebcms.com/post/How-to-Link-Buttons-to-Pages-and-External-Links",
        keywords: ["link", "buttons", "page", "external", "internal", "cta", "navigation", "url", "connect"],
        category: "Navigation & Structure",
        difficulty: "beginner",
        popularity: 88
    },
    {
        title: "How To Create An Image Gallery In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Create-an-Image-Gallery-in-Morweb",
        keywords: ["image", "gallery", "create", "album", "photos", "media", "collection", "display", "grid"],
        category: "Media Management",
        difficulty: "intermediate",
        popularity: 87
    },
    {
        title: "How To Upload And Manage Images In The Media Library",
        url: "https://support.morwebcms.com/post/How-to-Upload-and-Manage-Images-in-the-Media-Library",
        keywords: ["upload", "manage", "images", "media", "library", "photos", "file", "organize", "gallery"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 92
    },
    {
        title: "How To Upload And Manage Video Files In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Upload-and-Manage-Video-Files-in-Morweb",
        keywords: ["upload", "manage", "video", "files", "media", "library", "mp4", "clips", "stream"],
        category: "Media Management",
        difficulty: "intermediate",
        popularity: 83
    },
    {
        title: "What Is Morweb An Overview Of Features And Benefits",
        url: "https://support.morwebcms.com/post/What-is-Morweb-An-Overview-of-Features-and-Benefits",
        keywords: ["overview", "features", "benefits", "platform", "intro", "summary", "tools", "why", "about"],
        category: "Getting Started",
        difficulty: "beginner",
        popularity: 78
    },
    {
        title: "How To Create A Table",
        url: "https://support.morwebcms.com/post/How-to-Create-a-Table",
        keywords: ["create", "table", "rows", "columns", "data", "layout", "grid", "insert", "editor"],
        category: "Content Editing",
        difficulty: "intermediate",
        popularity: 85
    },
    {
        title: "How To Adjust Column Widths And Layouts",
        url: "https://support.morwebcms.com/post/How-to-Adjust-Column-Widths-and-Layouts",
        keywords: ["adjust", "column", "width", "layout", "table", "grid", "resize", "design", "spacing"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 79
    },
    {
        title: "How To Change Headline Color",
        url: "https://support.morwebcms.com/post/How-to-Change-Headline-Color",
        keywords: ["headline", "color", "change", "style", "css", "design", "title", "text", "theme"],
        category: "Design & Layout",
        difficulty: "beginner",
        popularity: 86
    },
    {
        title: "Hot To Add Heading",
        url: "https://support.morwebcms.com/post/Hot-to-add-Heading",
        keywords: ["add", "heading", "title", "h1", "h2", "text", "insert", "editor", "format"],
        category: "Content Editing",
        difficulty: "beginner",
        popularity: 91
    },
    {
        title: "How Do I Add Or Update Events On The Website",
        url: "https://support.morwebcms.com/post/How-do-I-add-or-update-events-on-the-website",
        keywords: ["events", "calendar", "add", "update", "schedule", "dates", "manage", "listing", "edit"],
        category: "Content Editing",
        difficulty: "intermediate",
        popularity: 82
    },
    {
        title: "How To Connect Your Morweb Analytics Dashboard",
        url: "https://support.morwebcms.com/post/How-to-Connect-Your-Morweb-Analytics-Dashboard",
        keywords: ["connect", "analytics", "dashboard", "stats", "tracking", "google", "metrics", "setup", "report"],
        category: "Integrations",
        difficulty: "intermediate",
        popularity: 84
    },
    {
        title: "How To Add An Accordion Subtemplate",
        url: "https://support.morwebcms.com/post/How-to-Add-an-Accordion-Subtemplate",
        keywords: ["accordion", "subtemplate", "toggle", "ui", "section", "faq", "expand", "collapse", "panel"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 80
    },
    {
        title: "How To Embedding YouTube And Vimeo Videos In Pages",
        url: "https://support.morwebcms.com/post/How-to-Embedding-YouTube-and-Vimeo-Videos-in-Pages",
        keywords: ["embed", "youtube", "vimeo", "video", "iframe", "page", "media", "player", "insert"],
        category: "Media Management",
        difficulty: "intermediate",
        popularity: 89
    },
    {
        title: "How To Add Google Tag Manager To Your Website",
        url: "https://support.morwebcms.com/post/How-to-Add-Google-Tag-Manager-to-Your-Website",
        keywords: ["google", "tag", "manager", "gtm", "analytics", "script", "tracking", "setup", "container"],
        category: "Integrations",
        difficulty: "advanced",
        popularity: 77
    },
    {
        title: "How To Add A Script To A Page",
        url: "https://support.morwebcms.com/post/How-to-add-a-script-to-a-page",
        keywords: ["add", "script", "javascript", "code", "custom", "page", "embed", "snippet", "html"],
        category: "Advanced Features",
        difficulty: "advanced",
        popularity: 73
    },
    {
        title: "How Do I Add A Video Banner Template",
        url: "https://support.morwebcms.com/post/How-do-I-add-a-Video-Banner-Template",
        keywords: ["video", "banner", "template", "hero", "header", "background", "media", "loop", "promo"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 81
    },
    {
        title: "How To Create And Display Alerts On Your Website",
        url: "https://support.morwebcms.com/post/How-to-Create-and-Display-Alerts-on-Your-Website",
        keywords: ["alerts", "notification", "banner", "message", "announcement", "create", "display", "popup", "info"],
        category: "Content Editing",
        difficulty: "intermediate",
        popularity: 85
    },
    {
        title: "How To Edit Your Website's Navigation Menu",
        url: "https://support.morwebcms.com/post/How-to-Edit-Your-Website-s-Navigation-Menu",
        keywords: ["navigation", "menu", "edit", "links", "header", "structure", "dropdown", "items", "update"],
        category: "Navigation & Structure",
        difficulty: "intermediate",
        popularity: 90
    },
    {
        title: "How To Integrate Stripe With Morweb",
        url: "https://support.morwebcms.com/post/How-to-Integrate-Stripe-with-Morweb",
        keywords: ["stripe", "payment", "checkout", "integration", "gateway", "ecommerce", "api", "billing", "setup"],
        category: "Integrations",
        difficulty: "advanced",
        popularity: 74
    },
    {
        title: "How To Edit Image Descriptions",
        url: "https://support.morwebcms.com/post/How-to-edit-image-descriptions",
        keywords: ["edit", "image", "description", "alt", "caption", "metadata", "seo", "accessibility", "update"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 87
    },
    {
        title: "Setting Up Form Submission Notifications",
        url: "https://support.morwebcms.com/post/Setting-Up-Form-Submission-Notifications",
        keywords: ["form", "submission", "notifications", "email", "alert", "setup", "auto", "response", "admin"],
        category: "Forms & Security",
        difficulty: "intermediate",
        popularity: 83
    },
    {
        title: "Setting A Featured Image For Blog Posts",
        url: "https://support.morwebcms.com/post/Setting-a-Featured-Image-for-Blog-Posts",
        keywords: ["featured", "image", "blog", "post", "thumbnail", "visual", "media", "highlight", "photo"],
        category: "Blog Management",
        difficulty: "beginner",
        popularity: 88
    },
    {
        title: "How To Add And Resize Images In Blog Posts In Morweb",
        url: "https://support.morwebcms.com/post/How-to-Add-and-Resize-Images-in-Blog-Posts-in-Morweb",
        keywords: ["add", "resize", "image", "blog", "post", "media", "photo", "scale", "optimize"],
        category: "Blog Management",
        difficulty: "beginner",
        popularity: 89
    },
    {
        title: "How To Optimize Images For Blog Posts",
        url: "https://support.morwebcms.com/post/How-to-Optimize-Images-for-Blog-Posts",
        keywords: ["optimize", "compress", "image", "blog", "post", "seo", "speed", "performance", "photo"],
        category: "Blog Management",
        difficulty: "intermediate",
        popularity: 84
    },
    {
        title: "How To Use Subtemplates To Format A Page",
        url: "https://support.morwebcms.com/post/How-to-Use-Subtemplates-to-Format-a-Page",
        keywords: ["subtemplates", "layout", "format", "page", "design", "structure", "template", "blocks", "builder"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 82
    },
    {
        title: "Creating And Managing Columns In Morweb",
        url: "https://support.morwebcms.com/post/Creating-and-Managing-Columns-in-Morweb",
        keywords: ["columns", "create", "manage", "grid", "layout", "design", "flex", "responsive", "structure"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 80
    },
    {
        title: "How To Use Content Areas",
        url: "https://support.morwebcms.com/post/How-to-Use-Content-Areas",
        keywords: ["content", "areas", "region", "section", "widget", "layout", "page", "blocks", "editor"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 78
    },
    {
        title: "How To Use Content Width",
        url: "https://support.morwebcms.com/post/How-to-Use-Content-Width",
        keywords: ["content", "width", "container", "fluid", "layout", "design", "responsive", "size", "max"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 76
    },
    {
        title: "How To Add A Count Up Animation For Statistics And Metrics",
        url: "https://support.morwebcms.com/post/How-to-Add-a-Count-Up-Animation-for-Statistics-and-Metrics",
        keywords: ["count", "animation", "counter", "numbers", "statistics", "metrics", "effect", "increment", "scroll"],
        category: "Advanced Features",
        difficulty: "advanced",
        popularity: 75
    },
    {
        title: "Overview Of Form Management In Morweb",
        url: "https://support.morwebcms.com/post/Overview-of-Form-Management-in-Morweb",
        keywords: ["form", "management", "overview", "build", "edit", "submissions", "fields", "data", "admin"],
        category: "Forms & Security",
        difficulty: "intermediate",
        popularity: 83
    },
    {
        title: "How To Use Spacers For Better Page Layouts",
        url: "https://support.morwebcms.com/post/How-to-Use-Spacers-for-Better-Page-Layouts",
        keywords: ["spacer", "layout", "gap", "padding", "design", "page", "space", "elements", "arrange"],
        category: "Design & Layout",
        difficulty: "beginner",
        popularity: 81
    },
    {
        title: "How To Set Viewing Permissions For Media Galleries",
        url: "https://support.morwebcms.com/post/How-to-Set-Viewing-Permissions-for-Media-Galleries",
        keywords: ["viewing", "permissions", "media", "gallery", "privacy", "access", "roles", "secure", "restrict"],
        category: "User Management",
        difficulty: "intermediate",
        popularity: 77
    },
    {
        title: "Creating Pop Ups For Promotions And Announcements",
        url: "https://support.morwebcms.com/post/Creating-Pop-Ups-for-Promotions-and-Announcements",
        keywords: ["pop-up", "modal", "overlay", "promotion", "announcement", "alert", "design", "campaign", "banner"],
        category: "Design & Layout",
        difficulty: "intermediate",
        popularity: 79
    },
    {
        title: "Common Image Upload Errors And Fixes",
        url: "https://support.morwebcms.com/post/Common-Image-Upload-Errors-and-Fixes",
        keywords: ["image", "upload", "error", "fix", "troubleshoot", "solution", "media", "issue", "photo"],
        category: "Troubleshooting",
        difficulty: "intermediate",
        popularity: 85
    },
    {
        title: "How To View And Export Form Submissions",
        url: "https://support.morwebcms.com/post/How-to-View-and-Export-Form-Submissions",
        keywords: ["view", "export", "form", "submissions", "csv", "download", "data", "report", "entries"],
        category: "Forms & Security",
        difficulty: "beginner",
        popularity: 86
    },
    {
        title: "How To Sort And Organize Images In Folders 2",
        url: "https://support.morwebcms.com/post/How-to-Sort-and-Organize-Images-in-Folders-2",
        keywords: ["sort", "organize", "images", "folders", "media", "manage", "arrange", "library", "structure"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 82
    },
    {
        title: "How To Upload And Link PDFs And Other Documents",
        url: "https://support.morwebcms.com/post/How-to-Upload-and-Link-PDFs-and-Other-Documents",
        keywords: ["upload", "link", "pdf", "document", "file", "download", "media", "attach", "library"],
        category: "Media Management",
        difficulty: "beginner",
        popularity: 88
    }
];
        
        // Process the data (removed URL normalization since URLs are already complete)
        this.supportArticles = mockData.map(article => ({
            ...article,
            searchText: this.createSearchText(article),
            keywordSet: new Set(article.keywords.map(k => k.toLowerCase()))
        }));

        this.isLoaded = true;

        if (this.supportArticles.length === 0) {
            this.updateStatus('No support articles available', 'empty');
            this.addMessage(
                'Sorry, there are no support articles available right now. Please contact your Project Coordinator for assistance.',
                'bot'
            );
            this.trackEvent('articles_empty');
            return;
        }

        this.updateStatus(`${this.supportArticles.length} support articles loaded`, 'success');
        this.hideStatusAfterDelay();

        this.trackEvent('articles_loaded', { count: this.supportArticles.length });
    }
    
    createSearchText(article) {
        return [
            article.title,
            ...article.keywords,
            article.category,
            article.url.split('/').pop()
        ].join(' ').toLowerCase();
    }
    
    // Enhanced search algorithm with fuzzy matching and better scoring
    searchArticles(query, limit = this.searchConfig.maxResults) {
        if (!query.trim() || !this.isLoaded || query.length < this.searchConfig.minQueryLength) {
            return [];
        }
        
        const processedQuery = this.preprocessQuery(query);
        if (processedQuery.length === 0) return [];
        
        const results = this.supportArticles.map(article => {
            const score = this.calculateRelevanceScore(article, processedQuery, query);
            return { ...article, score };
        })
        .filter(article => article.score > 0)
        .sort((a, b) => {
            // Sort by score first, then by popularity, then by difficulty (easier first)
            if (b.score !== a.score) return b.score - a.score;
            if (b.popularity !== a.popularity) return b.popularity - a.popularity;
            return a.difficulty === 'beginner' ? -1 : 1;
        })
        .slice(0, limit);
        
        this.trackEvent('search_performed', { 
            query, 
            results_count: results.length,
            top_score: results[0]?.score || 0
        });
        
        return results;
    }
    
    preprocessQuery(query) {
        return query.toLowerCase()
            .replace(/[^\w\s]/g, ' ')
            .split(/\s+/)
            .filter(word => 
                word.length > 2 && 
                !this.searchConfig.stopWords.has(word)
            );
    }
    
    calculateRelevanceScore(article, queryWords, originalQuery) {
        let score = 0;
        const title = article.title.toLowerCase();
        const titleWords = title.split(/\s+/);
        
        queryWords.forEach(word => {
            // Exact title matches (highest weight)
            if (title.includes(word)) {
                score += titleWords.some(tw => tw === word) ? 15 : 8;
            }
            
            // Keyword matches
            if (article.keywordSet.has(word)) {
                score += 5;
            }
            
            // Fuzzy keyword matches
            article.keywords.forEach(keyword => {
                if (this.fuzzyMatch(word, keyword.toLowerCase())) {
                    score += 3;
                }
            });
            
            // Category matches
            if (article.category.toLowerCase().includes(word)) {
                score += 4;
            }
            
            // URL slug matches
            if (article.url.toLowerCase().includes(word)) {
                score += 2;
            }
        });
        
        // Boost for multiple word matches
        const matchedWords = queryWords.filter(word => 
            title.includes(word) || article.keywordSet.has(word)
        );
        
        if (matchedWords.length > 1) {
            score += matchedWords.length * 3;
        }
        
        // Boost for phrase matches
        if (originalQuery.length > 10 && title.includes(originalQuery.toLowerCase())) {
            score += 20;
        }
        
        // Popularity boost (slight)
        score += article.popularity * 0.1;
        
        return Math.round(score);
    }
    
    fuzzyMatch(word1, word2) {
        if (word1 === word2) return true;
        if (Math.abs(word1.length - word2.length) > 2) return false;
        
        // Simple edit distance check
        const maxDistance = Math.floor(Math.max(word1.length, word2.length) * 0.3);
        return this.editDistance(word1, word2) <= maxDistance;
    }
    
    editDistance(a, b) {
        const matrix = [];
        for (let i = 0; i <= b.length; i++) {
            matrix[i] = [i];
        }
        for (let j = 0; j <= a.length; j++) {
            matrix[0][j] = j;
        }
        for (let i = 1; i <= b.length; i++) {
            for (let j = 1; j <= a.length; j++) {
                if (b.charAt(i - 1) === a.charAt(j - 1)) {
                    matrix[i][j] = matrix[i - 1][j - 1];
                } else {
                    matrix[i][j] = Math.min(
                        matrix[i - 1][j - 1] + 1,
                        matrix[i][j - 1] + 1,
                        matrix[i - 1][j] + 1
                    );
                }
            }
        }
        return matrix[b.length][a.length];
    }
    
    handleSubmit(e) {
        e.preventDefault();
        
        const query = this.elements.input.value.trim();
        if (!query) return;
        
        this.addMessage(query, 'user');
        this.elements.input.value = '';
        this.adjustInputHeight();
        
        if (this.awaitingFeedback) {
            this.handleFeedbackResponse(query);
            return;
        }
        
        const conversationType = this.detectConversationType(query);
        if (conversationType) {
            this.handleConversationalResponse(conversationType);
            return;
        }
        
        this.performSearch(query);
    }
    
    detectConversationType(message) {
        const lower = message.toLowerCase().trim();
        
        for (const [type, patterns] of Object.entries(this.conversationPatterns)) {
            if (patterns.some(pattern => pattern.test(lower))) {
                return type;
            }
        }
        
        return null;
    }
    
    handleConversationalResponse(type) {
        const responses = this.responses[type];
        const response = responses[Math.floor(Math.random() * responses.length)];
        
        this.showTypingIndicator();
        setTimeout(() => {
            this.hideTypingIndicator();
            this.addMessage(response, 'bot');
            this.trackEvent('conversational_response', { type });
        }, 1000);
    }
    
    performSearch(query) {
        this.showTypingIndicator();
        this.elements.sendButton.disabled = true;
        
        setTimeout(() => {
            this.hideTypingIndicator();
            
            if (!this.isLoaded) {
                this.addMessage("I'm still loading the support articles. Please wait a moment and try again.", 'bot');
                this.elements.sendButton.disabled = false;
                return;
            }
            
            const results = this.searchArticles(query);
            this.lastSearchResults = results;
            
            if (results.length === 0) {
                this.handleNoResults(query);
            } else {
                this.displaySearchResults(results, query);
                setTimeout(() => this.askForFeedback(), 1500);
            }
            
            this.elements.sendButton.disabled = false;
        }, 2000);
    }
    
    handleNoResults(query) {
        const suggestions = [
            "I couldn't find specific articles for that. Try searching for topics like 'setup', 'troubleshooting', 'user management', or 'content editing'.",
            "No exact matches found. You might want to try different keywords or browse our popular articles.",
            "I don't see articles matching that exactly. Could you try rephrasing or using different terms?"
        ];
        
        const response = suggestions[Math.floor(Math.random() * suggestions.length)];
        this.addMessage(response, 'bot');
        
        // Show popular articles as alternatives
        const popularArticles = this.supportArticles
            .sort((a, b) => b.popularity - a.popularity)
            .slice(0, 3);
        
        if (popularArticles.length > 0) {
            setTimeout(() => {
                this.addMessage("Here are some popular articles that might help:", 'bot');
                this.displayArticleResults(popularArticles);
            }, 1000);
        }
        
        this.trackEvent('no_results', { query });
    }
    
    displaySearchResults(results, query) {
        const responseTexts = [
            `I found ${results.length} helpful article${results.length > 1 ? 's' : ''} for you:`,
            `Here ${results.length > 1 ? 'are' : 'is'} ${results.length} relevant article${results.length > 1 ? 's' : ''}:`,
            `Great question! I found ${results.length} article${results.length > 1 ? 's' : ''} that should help:`
        ];
        
        const responseText = responseTexts[Math.floor(Math.random() * responseTexts.length)];
        this.addMessage(responseText, 'bot');
        
        setTimeout(() => {
            this.displayArticleResults(results);
        }, 500);
    }
    
    displayArticleResults(results) {
        const resultsHTML = results.map((result, index) => `
            <div class="result-item" data-url="${result.url}" data-index="${index}" role="button" tabindex="0" aria-label="Open article: ${result.title}">
                <div class="result-title">${result.title}</div>
                <div class="result-url">${result.url}</div>
                ${result.category ? `<div style="font-size: 11px; color: var(--chat-text-light); margin-top: 4px;">${result.category}</div>` : ''}
            </div>
        `).join('');
        
        const messageElement = this.addMessage(resultsHTML, 'bot', true);
        
        // Enhanced click handlers with keyboard support
        messageElement.querySelectorAll('.result-item').forEach(item => {
            const url = item.getAttribute('data-url');
            
            const openLink = (e) => {
                e.preventDefault();
                
                console.log('Original URL from data-url:', url);
                
                // Clean the URL to remove any double https://
                let cleanUrl = url;
                if (cleanUrl.startsWith('https://https://')) {
                    cleanUrl = cleanUrl.replace('https://https://', 'https://');
                }
                if (cleanUrl.startsWith('http://https://')) {
                    cleanUrl = cleanUrl.replace('http://https://', 'https://');
                }
                
                console.log('Cleaned URL:', cleanUrl);
                
                // Validate URL before opening
                if (!this.isValidUrl(cleanUrl)) {
                    this.addMessage("Sorry, this article link is not available yet. Please contact support for assistance.", 'bot');
                    return;
                }
                
                this.trackEvent('article_clicked', { 
                    url: cleanUrl, 
                    title: item.querySelector('.result-title').textContent 
                });
                window.open(cleanUrl, '_blank', 'noopener,noreferrer');
            };
            
            item.addEventListener('click', openLink);
            item.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    openLink(e);
                }
            });
        });
    }
    
    isValidUrl(url) {
        try {
            new URL(url);
            return true; // Allow all properly formatted URLs
        } catch {
            return false;
        }
    }
    
    askForFeedback() {
        this.awaitingFeedback = true;
        this.addMessage("Did you find what you were looking for?", 'bot');
    }
    
    handleFeedbackResponse(response) {
        const lower = response.toLowerCase();
        this.awaitingFeedback = false;
        
        // Positive feedback
        if (/\b(yes|found|helpful|good|thanks|perfect|exactly)\b/i.test(lower)) {
            this.addMessage("Great! I'm glad I could help you find what you were looking for. Feel free to ask if you have any other questions!", 'bot');
            this.feedbackAttempts = 0;
            this.trackEvent('positive_feedback');
            return;
        }
        
        // Negative feedback
        if (/\b(no|not|different|more|other|didn't|couldn't)\b/i.test(lower)) {
            this.feedbackAttempts++;
            this.trackEvent('negative_feedback', { attempt: this.feedbackAttempts });
            
            if (this.feedbackAttempts === 1) {
                this.offerAlternativeHelp(response);
            } else {
                this.escalateToSupport();
            }
            return;
        }
        
        // Unclear feedback
        this.addMessage("I'm not sure if that helped or not. Could you please let me know with a simple 'yes' or 'no' - did you find what you were looking for?", 'bot');
        this.awaitingFeedback = true;
    }
    
    offerAlternativeHelp(query) {
        this.addMessage("Let me try to find some additional articles that might help:", 'bot');
        
        // Try broader search or different approach
        const moreResults = this.searchArticles(query, 8)
            .filter(result => !this.lastSearchResults.some(prev => prev.url === result.url))
            .slice(0, 3);
        
        if (moreResults.length > 0) {
            setTimeout(() => {
                this.displayArticleResults(moreResults);
                this.lastSearchResults = [...this.lastSearchResults, ...moreResults];
                setTimeout(() => this.askForFeedback(), 1500);
            }, 1000);
        } else {
            this.escalateToSupport();
        }
    }
    
    escalateToSupport() {
        this.addMessage("I understand the articles I found aren't quite what you're looking for. For more personalized assistance with your specific situation, I'd recommend reaching out to your Project Coordinator. They'll be able to provide you with direct support and help resolve your question more effectively.", 'bot');
        this.feedbackAttempts = 0;
        this.trackEvent('escalated_to_support');
    }
    
    addMessage(content, sender = 'bot', isHTML = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}`;
        messageDiv.setAttribute('role', sender === 'bot' ? 'status' : 'log');
        
        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = 'message-bubble';
        
        if (isHTML) {
            bubbleDiv.innerHTML = content;
        } else {
            bubbleDiv.textContent = content;
        }
        
        messageDiv.appendChild(bubbleDiv);
        this.elements.messages.appendChild(messageDiv);
        this.scrollToBottom();
        
        return messageDiv;
    }
    
    showTypingIndicator() {
        if (this.typingIndicator) return;
        
        this.typingIndicator = document.createElement('div');
        this.typingIndicator.className = 'message bot';
        this.typingIndicator.innerHTML = `
            <div class="message-bubble">
                <div class="typing-indicator">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>
        `;
        
        this.elements.messages.appendChild(this.typingIndicator);
        this.scrollToBottom();
    }
    
    hideTypingIndicator() {
        if (this.typingIndicator) {
            this.typingIndicator.remove();
            this.typingIndicator = null;
        }
    }
    
    updateStatus(message, type = 'loading') {
        this.elements.statusMessage.textContent = message;
        this.elements.statusMessage.className = `status-message ${type}`;
        this.elements.statusMessage.style.display = 'block';
    }
    
    hideStatusAfterDelay(delay = 3000) {
        setTimeout(() => {
            this.elements.statusMessage.style.display = 'none';
        }, delay);
    }
    
    scrollToBottom() {
        this.elements.messages.scrollTop = this.elements.messages.scrollHeight;
    }
    
    // Analytics tracking (placeholder for real implementation)
    trackEvent(eventName, data = {}) {
        if (typeof gtag !== 'undefined') {
            gtag('event', eventName, {
                event_category: 'chat_widget',
                ...data
            });
        }
        console.log('Chat Event:', eventName, data);
    }
}

// Initialize the chat widget when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new MorwebSupportChat();
});
</script>