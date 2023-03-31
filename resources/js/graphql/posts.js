import gql from "graphql-tag";

export const ALL_POSTS_QUERY = gql`
    query AllPostsQuery(
        $keywords: String
        $filters: String
        $authorByName: String
        $first: Int!
        $after: String
        $taxonomy: String
        $termName: String
    ) {
        posts(
            first: $first
            after: $after
            where: {
                filters: $filters
                keywords: $keywords
                authorByName: $authorByName
                taxonomy: $taxonomy
                termName: $termName
            }
        ) {
            pageInfo {
                hasNextPage
                endCursor
            }
            nodes {
                title
                uri
                excerpt
                date
                categories {
                    nodes {
                        name
                    }
                }
                featuredImage {
                    node {
                        mediaItemUrl
                        mediaDetails {
                            sizes {
                                sourceUrl
                                width
                            }
                        }
                    }
                }
            }
        }
    }
`;

export const NEW_ARTICLE = gql`
    query NewQuery($notIn: [ID]) {
        posts(first: 4, where: {orderby: {order: DESC, field: DATE}, notIn: $notIn}) {
            nodes {
                postId
                title
                date
                featuredImage {
                    node {
                        mediaItemUrl
                    }
                }
                link
            }
        }
        mediaItemBy(slug: "non-images") {
            mediaItemUrl
        }
    }
`;
