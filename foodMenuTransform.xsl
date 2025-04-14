<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                xmlns:fm="http://www.example.com/foodmenu" 
                version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Food Menu</title>
                <style>
                    /* General Styles */
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f9f9f9;
                        color: #333333;
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }

                    .container {
                        width: 90%;
                        max-width: 1200px;
                        background: #ffffff;
                        padding: 30px 40px;
                        border-radius: 10px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                        border: 2px solid #1DB954;
                    }

                    h1 {
                        text-align: center;
                        font-size: 2.8rem;
                        margin-bottom: 1.5rem;
                        color: #1DB954;
                        text-transform: uppercase;
                        letter-spacing: 2px;
                    }

                    .category {
                        margin-bottom: 3rem;
                    }

                    .category h2 {
                        font-size: 2rem;
                        margin-bottom: 1rem;
                        color: #1DB954;
                        border-bottom: 3px solid #1DB954;
                        padding-bottom: 5px;
                    }

                    ul {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }

                    li {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding: 20px;
                        background: #f7f7f7;
                        border: 1px solid #dddddd;
                        border-radius: 8px;
                        margin-bottom: 10px;
                        transition: all 0.3s ease-in-out;
                        position: relative;
                    }

                    li:hover {
                        background: #e8f5e9;
                        transform: translateY(-5px);
                        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
                    }

                    li b {
                        font-size: 1.2rem;
                        color: #333333;
                    }

                    .price {
                        font-weight: bold;
                        font-size: 1.2rem;
                        color: #1DB954;
                        transition: color 0.3s ease, transform 0.3s ease;
                    }

                    li:hover .price {
                        color: #388e3c;
                        transform: scale(1.1);
                    }

                    .description {
                        font-size: 0.9rem;
                        color: #555555;
                        font-style: italic;
                        transition: color 0.3s ease;
                    }

                    li:hover .description {
                        color: #333333;
                    }

                    /* Responsive Design */
                    @media (max-width: 768px) {
                        .container {
                            padding: 20px;
                        }

                        h1 {
                            font-size: 2.2rem;
                        }

                        .category h2 {
                            font-size: 1.8rem;
                        }

                        li {
                            padding: 15px;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Food Menu</h1>
                    <xsl:apply-templates select="fm:foodMenu/fm:menu/fm:category" />
                </div>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="fm:category">
        <div class="category">
            <h2><xsl:value-of select="@name" /></h2>
            <ul>
                <xsl:for-each select="fm:item">
                    <xsl:choose>
                        <xsl:when test="fm:price &lt; 10">
                            <li>
                                <div>
                                    <b><xsl:value-of select="fm:name" /></b>
                                    <span class="description"> - <xsl:value-of select="fm:description" /></span>
                                </div>
                                <span class="price">₹<xsl:value-of select="fm:price" /></span>
                            </li>
                        </xsl:when>
                        <xsl:otherwise>
                            <li>
                                <div>
                                    <b><xsl:value-of select="fm:name" /></b>
                                    <xsl:if test="fm:description">
                                    <span class="description"> - <xsl:value-of select="fm:description" /></span>
                                    </xsl:if>
                                </div>
                                <span class="price">₹<xsl:value-of select="fm:price" /></span>
                            </li>
                        </xsl:otherwise>
                    </xsl:choose>
                </xsl:for-each>
            </ul>
        </div>
    </xsl:template>
</xsl:stylesheet>
