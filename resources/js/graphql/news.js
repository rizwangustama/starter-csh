import gql from "graphql-tag";

export const NEWS = gql`
    query queryPosts(
        $after: String, $first: Int!, $exclude_ids:[ID],
        $author: Int,
        $staffId: Int) {
        posts(
            first: $first,
            after: $after,
            where: {
                notIn:$exclude_ids,
                author: $author,
                staffId: $staffId,
                status: PUBLISH, 
                hasPassword: false
            }
        ) {
            pageInfo {
                hasNextPage
                endCursor
            }
            nodes {
                databaseId
                title
                link
                date
                excerpt
                content
                categories {
                    nodes {
                      name
                    }
                }
                featuredImage {
                    node {
                        mediaDetails {
                            sizes {
                                sourceUrl
                                width
                            }
                        }
                        mediaItemUrl
                    }
                }
            }
        }
    }
`;
