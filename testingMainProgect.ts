
const Header = async (props) => {
    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/posts/1');
        const jsonData = await response.json();

        let users = ['user1', 'user2'];

        return {
            selector: 'main-components',
            style: ['.test{  color: hotpink;}'],
            template: `
                <div class='bg-red-200 test'> 
                    ${props} thsldkfff
                    ${users?.map((data) => ` <div> ${data}</div>`).join('')}
                    <div>Data from API: ${jsonData.title}</div>
                </div>`,
        };
    }
    catch (error) { console.log(error) }
}

(function regusterComponent(component: any) {
    // let { selector } :any = component();
    class ComponentClass extends HTMLElement {
        componentElement = component(JSON.parse(this.getAttribute('props')))
        constructor() {
            super();
        }
        connectedCallback() {
            this.innerHTML = `
                            <style> ${this.componentElement.style}</style>
                            ${this.componentElement.template}
                         `;
        }

        attributeChangedCallback(attrName, oldVal, newVal) {
            console.log(attrName, oldVal, newVal)
        }

    }
    window.customElements.define('main-components', ComponentClass);
})(Header);