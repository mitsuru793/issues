issue: [\[BUG\]\[typescript\-fetch\] generator does not map Java Date object to string · Issue \#3538 · OpenAPITools/openapi\-generator](https://github.com/OpenAPITools/openapi-generator/issues/3538)

## build
```
yarn run build
```

generated/にopenapiのクライアントが生成されます。

新しいバージョンのgeneratorではinterface PostのプロパティはDateからstringに変換される。しかし、関数PostFromJSONTypedが変換されない。

typescript-axiosでは、デコード関数などは出力されないため問題になりません。

```typescript
/**
 * 
 * @export
 * @interface Post
 */
export interface Post {
    /**
     * 
     * @type {number}
     * @memberof Post
     */
    id?: number;
    /**
     * 
     * @type {string}
     * @memberof Post
     */
    title?: string;
    /**
     * 
     * @type {string}
     * @memberof Post
     */
    createAt?: string;
}

export function PostFromJSONTyped(json: any, ignoreDiscriminator: boolean): Post {
    if ((json === undefined) || (json === null)) {
        return json;
    }
    return {
        'id': !exists(json, 'id') ? undefined : json['id'],
        'title': !exists(json, 'title') ? undefined : json['title'],
        // new Dateになっている
        'createAt': !exists(json, 'createAt') ? undefined : (new Date(json['createAt'])),
    };
}
```
